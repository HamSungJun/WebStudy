
window.onload = prepareButton;
function prepareButton() {
    document.getElementById('Pimpin').onclick = Bigger_Pimpin;
    $("Pimpin-").observe("click",Smaller_Pimpin);
    document.getElementById('Bling').onchange = Bling;
    document.getElementById('Snoopify').onclick = Snoopify;
    document.getElementById('Malkovitch').onclick = Malkovitch;
    document.getElementById('Lgpay').onclick = Lgpay;
};
var pimpiner = null; //this is timer id
var initial_size = 12;
function font_increaser() {
    initial_size++;
    initial_size++;
    $("my_Textarea").style.fontSize = parseInt(initial_size)+"pt";
};
function font_decreaser() {
    initial_size--;
    initial_size--;
    $("my_Textarea").style.fontSize = parseInt(initial_size)+"pt";
};

var Bigger_Pimpin = function () {
    // alert("Hello, world!");
    // $("my_Textarea").style.fontSize;
    if(pimpiner === null){
    pimpiner = setInterval(font_increaser,500);
    }
    else{
        clearInterval(pimpiner);
        pimpiner = null;
    }
};
    function Smaller_Pimpin () {
    // alert("Hello, world!");
    // $("my_Textarea").style.fontSize;
    if(pimpiner === null){
    pimpiner = setInterval(font_decreaser,500);
    }
    else{
        clearInterval(pimpiner);
        pimpiner = null;
    }
};
var Bling = function () {
    var div_1 = document.getElementById("div_1");
    if($("Bling").checked == true){
        $("my_Textarea").style.fontWeight = "Bold";
        $("my_Textarea").style.color = "green";
        $("my_Textarea").style.textDecoration = "Underline";
        
        div_1.style.backgroundImage = 'url(http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg)';

       
    }
    else{
        $("my_Textarea").style.fontWeight = "Normal";
        $("my_Textarea").style.color = "black";
        $("my_Textarea").style.textDecoration = "None";
        
        div_1.style.backgroundImage = null;
    };

};

var Snoopify = function () {
    // $("my_Textarea").style.textTransform = "uppercase";
    var Input_String = $("my_Textarea").value;
    var Upper_String = Input_String.toUpperCase();
    var Splited_String = Upper_String.split(".");
    var izzle_Joined_String = Splited_String.join("-izzle.");

    $("my_Textarea").value = izzle_Joined_String;
};

var Malkovitch = function(){
    
    var MyString =  $("my_Textarea").value;
    var splited_MyString = MyString.split(" ");

    for (var index = 0; index < splited_MyString.length; index++) {
        if(splited_MyString[index].length >= 5){
            splited_MyString[index] = "Malkovitch";
        }
        
    };

    var Malkoved_MyString = splited_MyString.join(" ");
    $("my_Textarea").value = Malkoved_MyString;

};

function Lgpay() {
    MyValue = $("my_Textarea").value;
   MyStrings = MyValue.split(" ");
   for (var index = 0; index < MyStrings.length; index++) {
       MyStrings[index] = pigWord(MyStrings[index]);
   } 
//    alert(MyStrings);
   MyValue = MyStrings.join(" ");
   $("my_Textarea").value = MyValue;
}

function piggify(Splited_String){
    var Source = Splited_String.replace(/[^A-Za-z -]/g, '').split(" ");
    for (var i = Source.length - 1; i >= 0; i--) {
      Splited_String = Splited_String.replace(Source[i],pigWord(Source[i]));
    }
    return Splited_String;
    };

function pigWord(Word){
        if (/^[aeiou]/i.test(Word)) {
            return Word + 'ay';
        }
        else {
            return Word.replace(/([^aeiou]+)(.+)$/i, "$2$1ay");
        }
    };