var http = require('http');
var fs = require('fs');

var server = http.createServer();
var port = 3000;

server.listen(port,function () {
    console.log("Server Listen on port 3000!!!");
});

server.on("connection",function (socket) {
    var addr = socket.address();
    console.log("클라이언트가 접속했습니다. %d , %s" , addr.port,addr.address);

});

server.on('request',function (req,res) {

    console.log("클라이언트 요청이 들어왔습니다.");

    fs.readFile('./house.png',function (err,data) {
        if(!err){
        res.writeHead(200,{
            "Content-Type" : "image/png; charset=utf-8"
        });
        res.write(data);
        res.end();
    }
        else{
            throw err;
        }
    })
    

    // console.dir(req);

});

server.on('close',function () {
    console.log("서버가 종료됩니다.");

});