process.on('tick',function (count) {
    console.log("tick 이벤트 발생." + count);
})

setTimeout(function () {
    console.log("2초후 tick이라는 이벤트 전달시도.");
    process.emit("tick",2);
},2000);