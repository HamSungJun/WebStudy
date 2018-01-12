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
    $now = new DateTime();
    $now->setTimezone(new DateTimeZone("Asia/Seoul"));
    

    $SPACE_ID = $_POST["P_LOT_SPACE_ID"];
    $CAR_OWNER = $_POST["CAR_OWNER"];
    $CAR_NUMBER = $_POST["CAR_NUMBER"];
    $PHONE_CALL = $_POST["PHONE_CALL"];
    $PARK_TIME = $now->format('Y-m-d H:i:s'); 

    // P_LOT_NAME VARCHAR(100),
    // P_LOT_SPACE_ID INT,
    // IS_PARKING VARCHAR(100) default "주차가능",
    // CAR_OWNER VARCHAR(100),
    // CAR_NUMBER VARCHAR(100),
    // PHONE_CALL VARCHAR(100),
    // PARK_TIME DATETIME default '0000-00-00 00:00:00',
    
    if(isset($SPACE_ID) && isset($CAR_OWNER) && isset($CAR_NUMBER) && isset($PHONE_CALL)){
        $INSERT_SQL = "INSERT INTO parking_lot_space VALUES('A1' , $SPACE_ID , '주차중' , '$CAR_OWNER' , '$CAR_NUMBER' , '$PHONE_CALL' , '$PARK_TIME')";

        $UPDATE_SQL = "UPDATE parking_lot set USING_SPACE = USING_SPACE + 1";
    
        $dbconn->query($INSERT_SQL);
        $dbconn->query($UPDATE_SQL);
    }

   
}
?>