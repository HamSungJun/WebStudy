console.log("파라미터의 개수 : "  + process.argv.length );
console.dir(process.argv);

if (process.argv.length > 2) {
    console.log(process.argv[2]);
}
process.argv.forEach(function (item , index) {
 console.log(index + ' : ' + item);   
});