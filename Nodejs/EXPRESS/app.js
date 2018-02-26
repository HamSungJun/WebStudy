var express = require('express');
var app = express();
var router = express.Router();

router.use(function (req,res,next) {
    console.log(req.baseUrl + req.hostname);
})

app.use('/',)
app.listen(3000);