var express = require('express');
var server = require("http");
var bodyParser = require("body-parser");
var path = require('path');
// var static = require('serve-static');
var app = express();

app.use(bodyParser.urlencoded({extended : false}));
app.use(bodyParser.json());

// app.use(static(path.join(__dirname , 'public')));
app.use(express.static("public"));

app.get("/",function (req,res) {
    res.redirect("login.html");
})

app.get("/users/:uname",function (req,res) {
    var name = req.params.uname;
    res.send(name);
    console.log(name);
})

app.post("/login" ,function (req,res) {
    var id = req.body.id;
    var pw = req.body.password;

    res.send("ID :"  +id + "\n" + "PW :" + pw);
})

app.listen(3000,function () {
    console.log("go 3000");
})
