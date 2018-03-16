<?
    
        $dbconn = mysqli_connect("localhost","root","root","freeboard");
      
                $ID = $_POST["USER_ID"];
                $TITLE = $_POST["TITLE"];
                $CONTENT = $_POST["CONTENT"];
        
                $now = new DateTime();
                $now->setTimezone(new DateTimeZone("Asia/Seoul"));
                $TIMENOW = $now->format('Y-m-d H:i:s');
                
                $GET_NICKNAME_SQL = "SELECT NICKNAME FROM user WHERE ID = '$ID'";
                $RESULT = mysqli_query($dbconn,$GET_NICKNAME_SQL);
              
                $NICKNAME = mysqli_fetch_row($RESULT);
        
                $INSERT_ARTICLE_SQL = "INSERT INTO article(USER_ID,ARTICLE_NO,TITLE,CONTENT,CREATION_TIME) VALUES('$ID','','$TITLE','$CONTENT','$TIMENOW')";
                
                mysqli_query($dbconn,$INSERT_ARTICLE_SQL);
                

                $title_json = array(
                        "error" => "제목은 필수입니다.",
                        "sqlerror" => mysqli_error($dbconn),
                        "sqlerror2" => mysqli_error_list($dbconn),
                        "sqlerror3" => mysqli_errno($dbconn)

                );
                header("Content-type: application/json; charset=utf-8");
                print(json_encode($title_json));
        
       


?>