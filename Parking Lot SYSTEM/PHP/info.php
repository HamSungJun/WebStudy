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

        $INFO_SQL = "SELECT * FROM parking_lot WHERE P_LOT_NAME = '$P_LOT_NAME'";
        
        $result = $dbconn->query($INFO_SQL);

        $P_LOT_INFO = array(
            P_LOT_NAME => array(),
            IS_FREE => array(),
            IS_INOUTSIDE => array(),
            TOTAL_SPACE => array(),
            USING_SPACE => array(),
            LEFT_SPACE => array()
        );
        while ($data = mysqli_fetch_assoc($result)) {
            array_push($P_LOT_INFO["P_LOT_NAME"],$data["P_LOT_NAME"]);
            array_push($P_LOT_INFO["IS_FREE"],$data["IS_FREE"]);
            array_push($P_LOT_INFO["IS_INOUTSIDE"],$data["IS_INOUTSIDE"]);
            array_push($P_LOT_INFO["TOTAL_SPACE"],$data["TOTAL_SPACE"]);
            array_push($P_LOT_INFO["USING_SPACE"],$data["USING_SPACE"]);
            array_push($P_LOT_INFO["LEFT_SPACE"],$data["TOTAL_SPACE"] - $data["USING_SPACE"]);    
        }

        header("Content-Type: application/json; charset=UTF-8");
        print json_encode($P_LOT_INFO);
    }
?>