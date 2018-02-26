var express = require('express');
var http = require('http');

var app = express();

app.use(function (req,res,next) {
    
    console.log("첫번째 미들웨어 에서 요청을 처리 함");
    
    var user = req.header('User-Agent');
    var param = req.query.name;

    res.writeHead(200,{"Content-Type" : "text/html; charset=utf-8"})
    res.write("<h1>Express서버에서의 응답결과</h1>");
    res.write("<div><p>User-Agent : " + user + " + </p></div>");
    res.write("<div><p>param-Name : " + param + " + </p></div>")
})

http.createServer(app).listen(3000,function () {
    console.log("Express 서버가 3000번 포트에서 리스닝");
});
