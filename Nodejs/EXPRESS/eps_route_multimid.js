var express = require('express');
var http = require('http');

var app = express();

app.use(function (req,res,next) {
    console.log("첫번째 미들웨어에서 요청을 처리하기 시작.");
    
    req.user = 'mike';
    res.writeHead(200,{"Content-Type" : "text/html; charset=utf-8"});
    res.write("<h1>첫번째 미들웨어에서"+req.user+"가 응답한 결과입니다</h1>");
    next();
});

app.use(function (req,res,next) {
    console.log("두번째 미들웨어에서 요청을 처리하기 시작.");

    
    res.write("<h1>두번째 미들웨어에서"+req.user+"가 응답한 결과입니다</h1>");

});

http.createServer(app).listen(3000,function () {
    console.log("Express 서버가 3000번 포트를 리스닝");
});
