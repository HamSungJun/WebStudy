<?
    session_start();
    $MY_ID = "god1857";
    $MY_PASSWORD = "god1857";

    $POSTED_ID = $_POST["ID"];
    $POSTED_PASSWORD = $_POST["PASSWORD"];

    if (isset($_POST["ID"]) && $_POST["PASSWORD"]) {
        if ($MY_ID == $POSTED_ID && $MY_PASSWORD == $POSTED_PASSWORD) {

            echo("<script>alert('로그인 성공이얌 ><');</script>");
            $_SESSION["ID"] = $POSTED_ID;
            $_SESSION["PASSWORD"] = $POSTED_PASSWORD;
            echo("<script>location.replace('login_done.html');</script>");

        }
        else{

            echo("<script>alert('아이디와 패스워드가 틀려');</script>");
            echo("<script>location.replace('login_form.html');</script>");    
        }


    }
    else{

        echo("<script>alert('값이 제대로 다 안들어왔어');</script>");
        echo("<script>location.replace('login_form.html');</script>");

    }
?>