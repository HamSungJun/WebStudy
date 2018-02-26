var express = require('express');
var http = require('http');

var app = express();

app.use(function (req,res,next) {
    
    console.log("첫번째 미들웨어 에서 요청을 처리 함");
    // res.status(300).send('fobidden');
    // res.redirect("http://www.google.co.kr");
    res.end();
})

http.createServer(app).listen(3000,function () {
    console.log("Express 서버가 3000번 포트에서 리스닝");
});
