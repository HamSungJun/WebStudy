<?
$count = 1;
if (isset($_COOKIE["count"])) {
    $count = $_COOKIE["count"];
    $count++;
}
setcookie("count",$count,time() + 10);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>
    쿠키테스트 <br>

    <?
    if($count == 1){
    ?>
    첫 방문입니다. <br>
    <br>
    쿠키 정보가 없습니다. <br>
    페이지를 새로고침 하세요. <br>    
    <?}else{
     ?>
     당신의 방문은 <?= $count ?> 번째 입니다. <br>
     <br>
     10초 이내에 새로고침을 하면 카운트가 올라갑니다.
     <?   
    }
    ?>
</body>
</html>