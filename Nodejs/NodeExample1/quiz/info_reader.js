var fs = require('fs');
fs.readFile('./person_info.txt',{
    "encoding" : "utf-8"
},function (err,data) {
    if(err){ throw err }

    var lines_array = data.split("\r");
    console.log(lines_array);
    var nameline = lines_array;
    var name = nameline[0].split(" ");

    console.log(name[1]); 
    
})
