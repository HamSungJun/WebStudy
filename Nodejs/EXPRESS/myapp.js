var express = require('express');
var bodyparser = require('body-parser');
var app = express();

app.use(express.static('public'));
app.use(bodyparser.urlencoded({extended : false}));
app.use(bodyparser.json());

app.get('/',function (req,res) {
    // res.writeHead(200,{"Content-Type" : "text/html; charset=utf8"});
    res.send("<h1>Hello World</h1>");
    res.end();
})

app.get('/dynamic',function (req,res) {

    var output = `
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>output</title>
        </head>
        <body>
            <h1>다이내믹 url로 접근하셨군</h1>
        </body>
    </html>
    `
    
    res.send(output);
});

app.post('/login',function (req,res) {
    var id = req.body.email;
    var pw = req.body.password;

    res.send("<h1>이메일 : " + id + " 비밀번호 : " + pw);
    res.end();
});



app.listen(3000,function (param) { 
    console.log('Example app listening on port 3000!');
    console.log(__dirname);
 });
