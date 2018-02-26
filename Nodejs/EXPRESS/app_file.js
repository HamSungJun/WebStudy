var express = require('express');
var bodyParser = require('body-parser');
var fs = require('fs');
var app = express();
 
app.locals.pretty = true;
app.set('views','./views_file');
app.set('view engine', 'jade');
app.use(bodyParser.urlencoded({extended : false}));
app.use(bodyParser.json());

app.get('/topic/new' , function (req,res) {
    // res.send('new');
    res.render('new');
});

app.get('/topic',function (req,res) {
    fs.readdir('./data',{encoding : "utf8"},function (err,files) { 
        if (err) {
            throw err
        }
        res.render('topics',{
            topics : files
        });
     })
})

app.post('/topic' , function (req,res) {
    res.send(req.body.title + "<p></p>" + req.body.description + "<a href='/topic/new'>이전으로</a>");
    fs.appendFile("./data/"+req.body.title,req.body.description,{encoding : 'utf-8',
},function (err) {
        if (err) {
            throw err;
        }
        console.log("saved" + req.body.title+".txt");
    })

});

app.get('/topic/:id', function (req,res) {
    var filename = req.params.id;
    fs.readFile('./data/'+filename ,'utf8', function (err,data) {
        if (err) {
            throw err
        }
        else{
            fs.readdir('./data',{encoding : "utf8"},function (err,files) { 
                if (err) {
                    throw err
                }
                res.render('topics',{
                    topics : files,
                    title : filename,
                    content : data
                });
             })
        }
    })
})



app.listen(3000,function () {
    console.log('app is listening port 3000');
})