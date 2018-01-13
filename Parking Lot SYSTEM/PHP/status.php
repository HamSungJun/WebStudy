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
        $P_LOT_NAME = $_POST["P_LOT_NAME"];

        $SQL = "SELECT * FROM parking_lot_space WHERE P_LOT_NAME = '$P_LOT_NAME' ORDER BY P_LOT_SPACE_ID ASC";
        
        $result = $dbconn->query($SQL);

        $SPACE_INFO = array(
            NUMBERS => array(),
            CAR_OWNER => array(),
            CAR_NUMBER => array(),
            PHONE_CALL => array(),
            PARK_TIME => array(),

        );
        while ($data = mysqli_fetch_assoc($result)) {
            array_push($SPACE_INFO["NUMBERS"],$data["P_LOT_SPACE_ID"]);
            array_push($SPACE_INFO["CAR_OWNER"],$data["CAR_OWNER"]);
            array_push($SPACE_INFO["CAR_NUMBER"],$data["CAR_NUMBER"]);
            array_push($SPACE_INFO["PHONE_CALL"],$data["PHONE_CALL"]);
            array_push($SPACE_INFO["PARK_TIME"],$data["PARK_TIME"]);    
        }

        header("Content-Type: application/json; charset=UTF-8");
        print json_encode($SPACE_INFO);
    }
?>