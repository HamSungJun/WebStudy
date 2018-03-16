var express = require('express');
var cookieParser = require('cookie-parser');
var app = express();

app.use(cookieParser());

app.get('/count',function (req,res) {
    // console.log(req.cookies);
    if (req.cookies.count) {
        var count = "wleo12345@naver.com";
    }
    else{
        count = "wleo12345@naver.com";;
    }
    
    res.cookie('count',count);
    res.send("Count : " + count);
})

app.listen(8080);