var os = require('os');
var path = require('path');

console.log(os.hostname());
console.log(os.totalmem());
console.log(os.freemem());
console.log(os.cpus());
console.log(os.networkInterfaces());

console.log(path.join('/Users/HSJPRIME','Desktop'));
console.log(path.dirname('HSJPRIME/ch01_test7.js'));
console.log(path.basename('HSJPRIME/ch01_test7.js'));
console.log(path.extname('HSJPRIME/ch01_test7.js'));

var Person = {};

Person.name = "함성준";
Person.age = 25;
Person.major = "CSE";
Person.info = function () {
    console.log(this.name + this.age + this.major);
}
Person.hobby = {}
Person.hobby.exc = "배드민턴";
Person.hobby.food = "햄버거";
Person.hobby.game = "lol";
console.log(Person.info());
console.dir(Person.hobby);
// console.dir(Person);

var Users = [
    {
    "age" : 25 ,   
    "name" : "고아라"
    }
];

Users.push({"age" : 25 , "name" : "한은정"});
Users.push({"age" : 25 , "name" : "산다라박"});
// function add (a,b) { return a+b; }
// Users.push(add);
// Users.splice(1,1);
for (let index = 0; index < Users.length; index++) {
    console.log("인덱스 : %d 내용 : " + Users[index].age +" , "+ Users[index].name, index);
}
