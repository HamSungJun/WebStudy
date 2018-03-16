var fs = require('fs');
var http = require('http');
var server = http.createServer(function (req,res) {
    var instream = fs.createReadStream('./output.txt',{
        'encoding' : 'utf-8'
    });
    instream.pipe(res);
});

server.listen(7001,'127.0.0.1');
server.close();