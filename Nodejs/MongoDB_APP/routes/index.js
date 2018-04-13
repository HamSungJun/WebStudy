var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.sendFile("./index.html");
});
router.get('/other',function (req,res,next) {
  res.sendFile("./index2.html");
})

module.exports = router;
