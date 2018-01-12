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

        $SQL = "SELECT P_LOT_SPACE_ID FROM parking_lot_space WHERE P_LOT_NAME = '$P_LOT_NAME' ORDER BY P_LOT_SPACE_ID ASC";
        
        $result = $dbconn->query($SQL);

        $SPACE_NUMBERS = array(
            NUMBERS => array()
        );
        while ($data = mysqli_fetch_assoc($result)) {
            array_push($SPACE_NUMBERS["NUMBERS"],$data["P_LOT_SPACE_ID"]);    
        }

        header("Content-Type: application/json; charset=UTF-8");
        print json_encode($SPACE_NUMBERS);
    }
?>