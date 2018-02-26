var express = require('express');
var mysql = require('mysql');
var bodyParser = require('body-parser');
var app = express();

var dbconn = mysql.createConnection({

    host: 'localhost',
    user: 'root',
    password: 'hsjprime',
    database: 'server_lang',
    port: 3307

});

var languages = Array();
var description = '';
var author = '';

app.locals.pretty = true;
app.set('views', './views_file');
app.set('view engine', 'jade');

app.get('/', function (req, res) {

    dbconn.query("SELECT title FROM works order by id ASC", function (err, results, fields) {
        if (err) {
            console.log(err);
        } else {


            for (let index = 0; index < results.length; index++) {
                languages.push(results[index].title);
            }
            res.render('titles', {
                languages: languages
            });

        }
    });




})

app.get('/title/:id', function (req, res) {
    // http://localhost:3000/title/JAVASCRIPT
    var target_title = req.params.id;

    var INFO_SQL = 'SELECT title , description , author FROM works WHERE title = ?'
    var TITLE_SQL = 'SELECT title FROM works';

    var params = [target_title];

    dbconn.query(INFO_SQL, params, function (err, results, fields) {

        if (err) {
            console.log(err)
        } else {
            description = results[0].description;
            author = results[0].author;

            res.render('titles_info', {
                languages: languages,
                description: description,
                author: author
            })
        }

    })


})



app.listen(3000, function () {
    console.log("Server is listening on Port 3000!!!");
})