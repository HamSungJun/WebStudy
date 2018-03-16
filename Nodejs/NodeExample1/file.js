var fs = require("fs");
// 동기식 IO FILEREAD
var data = fs.readFileSync('./package.json','utf-8');
console.log(data);


fs.readFile('./package.json','utf-8',function (err,data2) {
    if (err) {
        console.log(err);
    }
    else {
        console.log(data2);
    }
    
});
