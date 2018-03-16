var express = require('express');
var http = require('http');
var bodyParser = require('body-parser');
var multer = require('multer');

var app = express();
var server = http.createServer(app);
var io = require('socket.io')(server);

var upload = multer({ dest: './uploads/' })

var _storage = multer.diskStorage({
    destination: function (req, file, cb) {
      cb(null, 'uploads/');
    },
    filename: function (req, file, cb) {
      cb(null, req.body.username+'-'+file.fieldname+'.jpg');
    }

  })
   
var upload = multer({ storage: _storage })

app.use(bodyParser.urlencoded({extended : false}));
app.use(bodyParser.json());
app.use(express.static('public'));
app.use(express.static('uploads'));

app.get('/',function (req,res) {
    res.sendFile('./index.html');
})

var user_lists = [];

app.post('/login/',upload.single('profile_img'),function (req,res) {

  console.log(req.body);
  var user = {
    name : req.body.username,
    info : req.body.userinfo
  };

  user_lists.push(user);
  res.redirect("../chat_room.html");
  
});

app.get('/chat_room.html',function (req,res) {
  for (let index = 0; index < user_lists.length; index++) {
    console.log(user_lists[index]);
  }
})

io.



server.listen(3000);
