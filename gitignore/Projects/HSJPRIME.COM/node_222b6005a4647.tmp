var express = require('express');
var app = express();

app.use(express.static('public'));

app.get('/',function (req,res) {
    // res.writeHead(200,{"Content-Type" : "Text/html; Charset=utf8"});
    res.send("index.html");
})

app.listen(3000,function () {
    console.log("app is running at port 3000!");
})