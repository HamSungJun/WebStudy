var express = require('express');
var http = require('http');
var app = express();

var server = http.createServer(app);
var io = require('socket.io')(server);

app.get('/', function(req, res){
    res.sendFile(__dirname + '/chat_ex.html');
});

io.on("connection",function (socket) {

   // 접속한 클라이언트의 정보가 수신되면
  socket.on('login', function(data) {
    console.log('Client logged-in:\n name:' + data.name + '\n userid: ' + data.userid);
    console.log()
    app.us
    // socket에 클라이언트 정보를 저장한다
    socket.name = data.name;
    socket.userid = data.userid;

    // 접속된 모든 클라이언트에게 메시지를 전송한다
    io.emit('login', data.name );
    });

    // 클라이언트로부터의 메시지가 수신되면
    socket.on('chat', function(data) {
        console.log('Message from %s: %s', socket.name, data.msg);
    
        var msg = {
          from : {
            name: socket.name,
            userid: socket.userid
          },
          
          msg: data.msg
    };

    io.emit('chat', msg);

});

    socket.on('forceDisconnect', function() {
        socket.disconnect();
    });

    socket.on('disconnect', function() {
        console.log('user disconnected: ' + socket.name);
    });


});

server.listen("3000", function() {
    console.log('Socket IO server listening on port 3000');
});

