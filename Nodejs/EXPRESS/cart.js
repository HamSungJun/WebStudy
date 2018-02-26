var express = require('express');
var cookieParser = require('cookie-parser');

var app = express();

var product_object = {
    1:{ name : 'SUPERMAN' },
    2:{ name : 'ICEMAN'}
}
app.use(cookieParser());

app.get('/product',function (req,res) {
    res.writeHead(200,{"Content-Type" : "text/html; charset=utf-8"});
    res.write('<h1>Product Lists</h1>');
    res.write("<ul>")    
  

    for (const key in product_object) {
        res.write("<li><a href=/cart/"+key+">"+product_object[key].name+"</a></li>");
    }

    res.write("</ul>")
    res.end("<a href='/cart'>cart</a>");    
})

app.get('/cart/:id' , function (req,res) {
    var product_num = req.params.id;
    
    if(req.cookies.cart){
        var cart = req.cookies.cart;
       
    }
    else{
        var cart = {};
        
    }

    if(!cart[product_num]){
        cart[product_num] = 1;
    }
    else{
        cart[product_num] = parseInt(cart[product_num])+1;
    }


    res.cookie('cart',cart);
    res.redirect('/cart');
})

app.get('/cart',function (req,res) {
    res.send(req.cookies.cart);
})

app.listen(3000);