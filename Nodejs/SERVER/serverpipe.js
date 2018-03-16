var http = require('http');
var fs = require('fs');

var server = http.createServer();

var port = 3000;
var host = "localhost";

server.listen(port,host,function () {
    console.log("Server is listening on Port 3000!");
})

server.on("connection",function (socket) {
    var addr = socket.address();
    console.log("클라이언트 접속 이벤트 발생 %d , %s", addr.port , addr.address);
})

server.on("request",function (req,res) {
    
    console.log("클라이언트 요청 발생");

    var filename = './house.png'
    var file_stream = fs.createReadStream(filename,{flags : 'r'});

    file_stream.pipe(res);
    
})