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

   var file = './house.png';
   var infile = fs.createReadStream(file,{flags : 'r'});
   var filelength = 0;
   var curlength = 0;

   fs.stat(file,function (err,stats) {
       filelength = stats.size;
   })
    
   res.writeHead(200,{ "Content-Type" : "image/png" });

   infile.on('readable',function () {
       var chunk;
       while(null !== (chunk = infile.read())){
           console.log('읽어들인 데이터 크기 : %d 바이트' , chunk.length);
           curlength += chunk.length;
           res.write(chunk,'utf-8',function (err) {
               console.log('파일 부분쓰기 완료 : %d , 파일 크기 : %d' , curlength , filelength);
               if (curlength >= filelength) {
                   res.end();
               }
           })

       }
   })
})