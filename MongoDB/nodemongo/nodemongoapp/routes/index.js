var express = require('express');
var router = express.Router();
var mongoose = require('mongoose');

mongoose.connect("mongodb://localhost/MongoDB_Study");
var db = mongoose.connection;

var STUDENT_SCHEMA = mongoose.Schema({
    "name" : 'string',
    "address" : 'string',
    "age" : 'number'
})

var STUDENT = mongoose.model('Schema' , STUDENT_SCHEMA); // 스키마 이름과 스키마 타입의 변수 파라미터

router.get('/',function (req,res) {
    console.log("connected.");

    var newStudent = new STUDENT({name:'Hong Gil Dong', address:'서울시 강남구 논현동', age:'22'});

    newStudent.save(function (err,data) {
        if(err)
            console.log(err);
        else
            console.log("SAVE! \n");
    })

    STUDENT.find(function (err,data) {
        console.log("---read all--- \n")
        if(err){
            console.log(err);
        }
        else{
            console.log(data);
            for(var i = 0 ; i < data.length ; i++){
                res.render('index',data[i]);
            }
        }

    })

    // db.close(function (err) {
    //     console.log(err);
    // })
})

module.exports = router;