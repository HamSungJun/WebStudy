var express = require('express');
var http = require('http');

var app = express();

app.use(function (req,res,next) {
    
    console.log("첫번째 미들웨어 에서 요청을 처리 함");

    res.writeHead(200,{"Content-Type" : "text/html; charset=utf-8"});
    res.write("<h1>첫 미들웨어에서 h1태그를 리스폰스 했습니다.</h1>");
    res.end();
})

http.createServer(app).listen(3000,function () {
    console.log("Express 서버가 3000번 포트에서 리스닝");
});


