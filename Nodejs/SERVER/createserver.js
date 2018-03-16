var http = require('http');

var server = http.createServer();

var port = 3000;
var host = '192.168.1.2';
server.listen(port,host,function () {
    console.log("웹 서버가 시작되었습니다 . %d , %s" , port , host);
})


