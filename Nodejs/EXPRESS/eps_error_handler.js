var express = require('express');
var http = require('http');
var static = require('serve-static');
var bodyparser = require('body-parser');
var path = require('path');
var expressErrorHandler = require('express-error-handler');


var app = express();

app.set('port',process.env.PORT || 3000);

app.use(bodyparser.urlencoded({extended : false}));
app.use(bodyparser.json());

app.use(static(path.join(__dirname,'process')));

var router = express.Router();

router.route('/process/login').post(function (req,res) {
    console.log('/process/login 액션을 처리하겠습니다.');

    var id = req.body.id;
    var pw = req.body.password

    res.writeHead(200,{"Content-Type" : "Text/html; charset=utf8"});
    res.write(id + "," + pw);
    res.write("<a href='/login2.html'>이전 로그인 페이지로 돌아가기.</a>");
    res.end();
});

app.use('/' , router);

var errorHandler = expressErrorHandler({
    static : {
        '404' : './process/404.html'
    }
});

app.use(expressErrorHandler.httpError(404));
app.use(errorHandler);
http.createServer(app).listen(3000,function () {
    console.log("3000포트");
    console.log(__dirname);
})