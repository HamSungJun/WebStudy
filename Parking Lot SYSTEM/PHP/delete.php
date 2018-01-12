<?
header("Content-Type: text/html; charset=UTF-8");
$host = "localhost";          // MySQL DB서버 host
$user = "root";                  // MySQL DB서버 접속 id
$password = "root";  // MySQL DB서버 접속 password
$dbname = "parking_lot";       // MySQL DB명

$dbconn = new mysqli($host,$user,$password,$dbname);


if(!$dbconn) {
   echo("DB 연결 실패");
   exit;
}
else{
   
    $CAR_NUMBER = $_POST["CAR_NUMBER"];

        $DELETE_SQL = "DELETE FROM parking_lot_space WHERE CAR_NUMBER = '$CAR_NUMBER'";

        $UPDATE_SQL = "UPDATE parking_lot set USING_SPACE = USING_SPACE - 1";
    
        $dbconn->query($DELETE_SQL);
        $dbconn->query($UPDATE_SQL);
    
}
?>