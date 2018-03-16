<?
    session_start();
    $SIGN = $_POST["LOGOUT"];
    if ($SIGN == "TRUE") {
        session_destroy();
        $logout_JSON = array(
            "logout" => "로그아웃 성공."
        );
        header('Content-Type: text/html; charset=utf-8');
        print(json_encode($logout_JSON));
    }
    else{
        $logout_JSON = array(
            "logout" => "서버 오류! 로그인 페이지로 이동합니다."
        );
        header('Content-Type: text/html; charset=utf-8');
        print(json_encode($logout_JSON));
    };
?>