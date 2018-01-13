<?
header("Content-Type: text/html; charset=UTF-8");
$SPACE_ID = 1;
$CAR_OWNER = '함성준';
$CAR_NUMBER = '12어 5551';
$PHONE_CALL = '010-3455-1209';

// if(preg_match('/^[0-9]{1,2}$/',$SPACE_ID) && preg_match('/^[가-힣\s]{1,4}$/',$CAR_OWNER) && preg_match('/^[0-9]{2}[가-힣]{1}\s[0-9]{4}$/',$CAR_NUMBER) && preg_match('/\(?(\d{2,3})\)?[ -.](\d{3,4})[ -.](\d{4})/',$PHONE_CALL)){

//     echo("텅과");


// }

if(preg_match('/^[0-9]{1,2}$/',$SPACE_ID)){
    echo("주차id 통과");
}
if(preg_match('/[\xE0-\xFF][\x80-\xFF][\x80-\xFF]/', $CAR_OWNER)){
    echo("차주인 통과");
}
if(preg_match('/^[0-9]{2}[\xE0-\xFF][\x80-\xFF][\x80-\xFF]{1}\s[0-9]{4}$/',$CAR_NUMBER)){
    echo("차번호 통과");
}
if(preg_match('/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/',$PHONE_CALL)){
    echo("전화번호");
}

?>