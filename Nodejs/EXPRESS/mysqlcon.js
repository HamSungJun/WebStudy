var mysql = require('mysql');

var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : 'hsjprime',
    port : 3307,
    database : 'server_lang'
});

connection.connect(function (err) {
    if (err) {
        console.log(err.message);
    }
});

connection.query("Select title from works",function (err,results,fields) {
    if (err) {
        console.log(err);
    }
    else{
        for (let index = 0; index < results.length; index++) {
            console.log(results[index].title);
            
        }
        
    }

  
});

connection.query("SELECT * FROM works",function (err,results,fields) {
    if (err) {
        console.log(err);
    }
    else{
        console.log(results);
    }
})
  
  connection.end();