var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');

var app = express();

app.locals.pretty = true;
app.set('views','./views_file');
app.set('view engine', 'jade');
app.use(bodyParser.urlencoded({extended : false}));
app.use(bodyParser.json());
app.use(session({
    secret : 'secret',
    resave : false,
    saveUninitialized : true
}));

var USERNAME = '';
var PASSWORD = '';

var USERDATA = {
    USERNAME : "HSJPRIME",
    PASSWORD : "HSJPRIME"
};


app.get('/',function (req,res) {
    res.render('login');
});

app.post('/login_send',function (req,res) {
    USERNAME = req.body.USERNAME;
    PASSWORD = req.body.PASSWORD;
    
    if (USERNAME == USERDATA.USERNAME && PASSWORD == USERDATA.PASSWORD) {
            req.session.USERNAME = USERNAME;
            res.redirect('/login/'+USERNAME);
    }
    
})

app.get('/login/:id',function (req,res) {
    res.send("hello" + req.session.USERNAME + "<br/><a href='/logout'>logout</a>");
});

app.get('/logout',function (req,res){
    req.session.destroy();
    res.send(req.session.USERNAME);
})

app.listen(3000);

