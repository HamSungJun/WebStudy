<?php
function USER_CHECK( $ID ,  $PW)
{
    global $dbconn;
    $CHECK_SQL = "SELECT * FROM User WHERE ID = '$ID' AND PASSWORD = '$PW'";
    $RESULT = mysqli_query($dbconn,$CHECK_SQL);

    if (mysqli_num_rows($RESULT) == 1) {
        $data = mysqli_fetch_row($RESULT);
        // 로그인 성공 세션에 저장
        session_start();
        $_SESSION["ID"] = $data[0];
        $_SESSION["PASSWORD"] = $data[1];
        $_SESSION["NICKNAME"] = $data[2];
        $_SESSION["TEL"] = $data[3];

        $GETPATH_SQL = "SELECT IMAGE_PATH FROM User_Image WHERE USER_ID = '$ID'";
        $PATH_RESULT = mysqli_query($dbconn , $GETPATH_SQL);

        $PATH = mysqli_fetch_row($PATH_RESULT);
        $_SESSION["PATH"] = substr($PATH[0],1);

        header('Content-Type: text/html; charset=utf-8');
        print("<script>alert('로그인 성공 본 페이지로 이동합니다.')</script>");
        print("<script>window.location.replace('../home.html')</script>");
        
    }
    else{
        header('Content-Type: text/html; charset=utf-8');
        print("<script>alert('회원정보가 존재하지 않습니다.')</script>");
        print("<script>window.location.replace('../index.html')</script>");
    }
}
if (isset($_POST["ID"]) && isset($_POST["PASSWORD"])){
    $dbconn = mysqli_connect("localhost","wleo12345","tjdwns12","wleo12345");
    if (!$dbconn) {
        echo mysqli_connect_errno();
    }
    $USER_ID = $_POST["ID"];
    $USER_PW = $_POST["PASSWORD"];
    
    USER_CHECK($USER_ID , $USER_PW);
}

?>