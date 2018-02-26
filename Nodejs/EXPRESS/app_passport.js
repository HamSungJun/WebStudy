var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');
var passport = require('passport');
var GoogleStrategy = require('passport-google-oauth2').Strategy;

var app = express();
var Get_User = {};
app.use(express.static('public'));
app.use(bodyParser.urlencoded({extended : false}));
app.use(session({
    secret : 'secret',
    resave : false,
    saveUninitialized : true
}));

app.use(passport.initialize());
app.use(passport.session());

passport.serializeUser(function (user,done) {
    done(null , user);
});

passport.deserializeUser(function (obj,done) {
    done(null , obj);
});

passport.use(new GoogleStrategy({
    clientID: '293557453106-mceflkv6vnf6ljuggsnvc96d2kor4nur.apps.googleusercontent.com',
    clientSecret: '87uf2lYClb8eukccvXGlQez9',
    callbackURL: 'http://localhost:3000/auth/google/callback'
}, function(accessToken, refreshToken, profile, done) {

    console.log(profile);
    Get_User = profile;



    process.nextTick(function() {
        user = profile;
        return done(null, user);
    });
}
));

app.get('/auth/google',passport.authenticate('google',{scope : ['profile']})
);

app.get('/auth/google/callback', passport.authenticate( 'google', { 
    successRedirect : '/',
    failureRedirect: '/login' }),
    function(req, res) {
        
    
});

app.get('/',function (req,res) {
    res.writeHead(200,{"Content-Type" : "Text/Html; charset=utf-8"});
    res.write(Get_User.displayName+'님');
    res.write("<img src="+Get_User.photos[0].value+">");
})
app.listen(3000);


