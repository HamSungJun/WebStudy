var express = require('express');
var http = require('http');
var bodyParser = require('body-parser');
var path = require('path');
var static = require('serve-static');

var app = express();

app.set('port',process.env.PORT || 3000);

app.use(bodyParser.urlencoded({extended : false}));
app.use(bodyParser.json());

app.use(static(path.join(__dirname , 'public')));

app.use(function (req,res,next) {
    console.log("미들웨어에서 요청을 처리하기 시작");

    var id = req.body.id;
    var pw = req.body.password;

    res.writeHead(200,{"Content-Type" : "text/html; charset=utf-8"});
    res.write("<p>"+ id + "," + pw +"</p>")
    res.end();
})

http.createServer(app).listen(3000,function () {
    console.log("Express 서버가 3000번 포트에서 리스닝");
});


