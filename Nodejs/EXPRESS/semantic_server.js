var express = require('express');
var bodyParser = require('body-parser');

var app = express();

app.use(bodyParser.urlencoded({extended : false}));
app.use(bodyParser.json());
app.use(express.static('public'));

app.post('/login/', function(req,res) {

    var id = req.body.ID;
    var pw = req.body.PASSWORD;

    console.log("ID : %s , PW : %s", id , pw);
    // res.redirect('../Semantic_Login.html');

})

app.listen(3000,function () {
    console.log('start');
});