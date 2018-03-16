var FileSystem = require('fs');

FileSystem.readFile('./lorem.txt','utf-8',function (err , data) {
    if (!err){
        console.log(data);
    }
    else {
        console.log(err);
    }
})

console.log("해당 파일에 \"안녕하세요\" 라는 문구를 추가합니다.");

FileSystem.writeFile("./lorem.txt","안녕하세요","utf-8",function (err) {
    // 파일이 그냥 새로 만들어지네;
    if (!err){
        FileSystem.readFile('./lorem.txt','utf-8',function (err2 , data) {
            if (!err2){
                console.log(data);
            }
            else {
                console.log(err2);
            }
        })
    }
    else {
        console.log(err);
    }

}) 
