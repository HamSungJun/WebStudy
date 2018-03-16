var user = require('./user.js');

function showuser() {
    return user.getUser();
}

console.log(showuser());