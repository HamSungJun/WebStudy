var url = require('url');
var querystring = require('querystring');

var URLOB = url.parse('https://www.google.co.kr/search?source=hp&ei=p6R5WpLKFcix8QXC9Y3YBA&q=%EC%8A%A4%ED%8B%B0%EB%B8%8C%EC%9E%A1%EC%8A%A4&oq=%EC%8A%A4%ED%8B%B0%EB%B8%8C%EC%9E%A1%EC%8A%A4&gs_l=psy-ab.3..0l10.1393.2427.0.2557.13.11.0.0.0.0.135.918.1j7.9.0....0...1c.1j4.64.psy-ab..7.6.688.6..35i39k1j0i3k1j0i131k1.110.inQGAXray_Y');

console.log(URLOB.protocol);
console.log(URLOB.host);
console.log(URLOB.query);

var param = querystring.parse(URLOB.query);
console.dir(URLOB);

var source = url.format(URLOB);
console.log(source);
console.log("---------------------------------------------");
console.log(param.q);
console.log(querystring.stringify(param));
