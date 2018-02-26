var mysql = require('mysql');
var connection = mysql.createConnection({
    host : 'localhost',
    user : 'root',
    password : 'password',
    dbname : 'freeboard'
});

connection.connect();

connection.query('SELECT * FROM article', function(err, rows, fields) {
    if (err) throw err;
    console.log('The solution is: ', rows[0]);
  });
  
  connection.end();