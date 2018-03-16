var calculator = {};

calculator.add = function (a,b) {
    return a+b;
}
calculator.mul = function (a,b) {
    return a*b;
};

console.log(calculator.add(3,5) + ':' + calculator.mul(3,5));

