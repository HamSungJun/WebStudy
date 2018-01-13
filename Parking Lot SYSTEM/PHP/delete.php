<?
header("Content-Type: text/html; charset=UTF-8");
$host = "localhost";          // MySQL DB서버 host
$user = "root";                  // MySQL DB서버 접속 id
$password = "root";  // MySQL DB서버 접속 password
$dbname = "parking_lot";       // MySQL DB명

$dbconn = mysqli_connect($host,$user,$password,$dbname);


if(!$dbconn) {
   echo("DB 연결 실패");
   exit;
}
else{
   
    $CAR_NUMBER = $_POST["CAR_NUMBER"];

        $DELETE_SQL = "DELETE FROM parking_lot_space WHERE CAR_NUMBER = '$CAR_NUMBER'";

        $UPDATE_SQL = "UPDATE parking_lot set USING_SPACE = USING_SPACE - 1";
    
        $delete_result = mysqli_query($dbconn,$DELETE_SQL);

        if(mysqli_affected_rows($dbconn) > 0){
            $dbconn->query($UPDATE_SQL);
        }
        
    
}
?>