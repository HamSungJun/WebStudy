console.log("결과는 %d입니다",10);
var mystring = "ㅎㅇㅎㅇ친구들";
console.log("텍스트는 %s 이다.",mystring);
var myjson = {
    "이름" : "함성준",
    "나이" : 25,
    "성별" : "남",
    "취미" : "게임"
}
console.log("제이슨은 %j 이다.",myjson);

console.dir(myjson);

var result = 0;
console.time("start");
for (let index = 0; index < 1000; index++) {

    result = result + index;
    
}
console.timeEnd("start");
console.log("값 : %d",result);
console.log(__filename);
console.log(__dirname);

