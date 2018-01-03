<?
    header("Content-Type: text/html; charset=UTF-8");
    $host = "localhost";          // MySQL DB서버 host
    $user = "god1857";                  // MySQL DB서버 접속 id
    $password = "tjdwns12";  // MySQL DB서버 접속 password
    $dbname = "god1857";       // MySQL DB명

    $dbconn = new mysqli($host,$user,$password,$dbname);

    if(!$dbconn) {
       echo("DB 연결 실패");
       exit;
    }

    //한글깨짐방지
    mysqli_query($dbconn, "set session character_set_connection=utf8;");
    mysqli_query($dbconn, "set session character_set_results=utf8;");
    mysqli_query($dbconn, "set session character_set_client=utf8;");

    $user_email = $_POST["Email"];
   

    $Search_SQL = "SELECT email FROM Users WHERE email ='$user_email'";
    $result = $dbconn->query($Search_SQL);
  
    if(mysqli_num_rows($result) == 0){
        $Registerble = array(
            "TF" => "true",
        );

        header("Content-Type: application/json; charset=UTF-8");
        print json_encode($Registerble);
    }

    else {
        $Registerble = array(
            "TF" => "false",
        );
        header("Content-Type: application/json; charset=UTF-8");
        print json_encode($Registerble);
    }
    
?>