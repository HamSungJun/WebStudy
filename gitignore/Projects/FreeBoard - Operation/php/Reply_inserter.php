<?
    $ARTICLE_NO = $_POST["ARTICLE_NO"];
    $NICKNAME = $_POST["NICKNAME"];
    $CONTENT = $_POST["CONTENT"];

    if ($ARTICLE_NO && $NICKNAME && strlen($CONTENT) > 0) {

        $dbconn = mysqli_connect("localhost","wleo12345","tjdwns12","wleo12345");
        // CREATION_TIME FORMAT == Y-M-D
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone("Asia/Seoul"));
        $YMD_TIME = $now->format('Y-m-d');
        
        $REPLY_INSERT_SQL = "INSERT INTO Article_Reply(ARTICLE_NO,REPLY_NO,NICKNAME,CONTENT,CREATION_TIME) VALUES ($ARTICLE_NO,NULL,'$NICKNAME','$CONTENT','$YMD_TIME')";
        mysqli_query($dbconn,$REPLY_INSERT_SQL);
        
        $error_json = array(
            "error" => mysqli_error($dbconn),
            "error2" => mysqli_error_list($dbconn),
            "error3" => mysqli_errno($dbconn)
        );
        print(json_encode($error_json));
        mysqli_close($dbconn);
    }
    else{
        print("<script>alert('들어온값에 뭔가 문제가 있당께');</script>");
        }
    
?>