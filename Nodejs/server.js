var express = require('express');

var app = express();
app.use(function (request , response) {
    response.send("<h1>HI Node.js</h1>");    
})


app.listen(1857 , function () {
    console.log("Server Running at http://127.0.0.1:1857");
});