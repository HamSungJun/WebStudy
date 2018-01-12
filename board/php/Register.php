<?php
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

    //유저정보 insert

    $Posted_Email = $_POST["Email"];
    $Posted_Password = $_POST["Password"];
    $Posted_Nickname = $_POST["Nickname"];
    $Posted_File = $_FILES["PROFILE"];

    if(isset($Posted_Email) && isset($Posted_Password) && isset($Posted_Nickname) && isset($Posted_File)){
        
        $USER_INSERT_SQL = "INSERT INTO Users VALUES ('$Posted_Email','$Posted_Password','$Posted_Nickname')";

        $sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
        $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file
    }
    
?>