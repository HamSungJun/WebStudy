var express = require('express');
var path = require('path');
var bodyParser = require('body-parser');
var helmet = require('helmet');
var router_main = require('./routes/router.js');
var app = express();

app.use(helmet());
app.use(express.static('public'));
app.use('/',router_main);
app.use(function(err, req, res, next) {
    res.status(500);
    res.render('error', { error: err });
})

app.listen(3000,function () {
    console.log("The App is Listening on port 3000");
})