var express = require('express');
var bodyParser = require('body-parser');
var multer = require('multer');

var _storage = multer.diskStorage({
    destination: function (req, file, cb) {
      cb(null, './uploads/')
    },
    filename: function (req, file, cb) {
      cb(null , "image - " + index++ + ".jpg");
    }
})
   
var upload = multer({ storage : _storage })

var fs = require('fs');

var app = express();

app.locals.pretty = true;
app.set('views','./views_file');
app.set('view engine', 'jade');

app.get('/file',function (req,res) {
    res.render('fileform');
})

app.post('/upload', upload.single('myfile') ,function (req,res) {
    console.log("file Uploaded.");
    console.log(req.file);
})

app.listen(3000,function () {
    console.log('server is listening on port 3000!');
})