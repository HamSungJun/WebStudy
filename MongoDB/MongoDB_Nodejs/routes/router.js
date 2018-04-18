var express = require('express');
var router = express.Router();
var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017";
var assert = require('assert');
var dbName = 'MongoDB_Study';

router.use(function timeLog(req, res, next) {
    console.log('Time: ', Date.now());
    next();
});

router.get('/', function(req, res) {
    res.sendFile("./index.html");
});

router.get('/storelist',function (req,res) {
   
    MongoClient.connect(url, function(err, client) {
        assert.equal(null, err);
        console.log("Connected correctly to server");
      
        const db = client.db(dbName);
      
        db.collection('store').find({}).toArray(function (err,docs) {
            assert.equal(null, err);
            res.json(docs);
            client.close();
        })
        
      });


})

module.exports = router;