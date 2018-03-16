var fs = require('fs');

fs.open('./lorem.txt','w',function (err,fd) {
    if(!err){
        var buf = new Buffer("안녕\n","utf-8");
        fs.write(fd,buf,0,buf.length,null,function (err2,written,buffer) {
            if(!err){
                console.log(err2,written,buffer);
                fs.close(fd,function () {
                    console.log("파일을 열고 데이터 기록후 닫기 완료");
                })
            }
        })
    }
    else{

    }
})