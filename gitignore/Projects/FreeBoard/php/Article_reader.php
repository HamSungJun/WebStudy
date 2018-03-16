<?

$ARTICLE_NO = $_POST["ARTICLE_NO"];
if ($ARTICLE_NO < 0) {
    print("<script>alert('내부 서버 오류! 잠시후에 이용해주세요.');</script>");
}
else {
    $GET_READDATA_SQL = "SELECT I.IMAGE_PATH , U.NICKNAME , U.TEL , A.CONTENT , A.TITLE FROM user U JOIN article A ON U.ID = A.USER_ID JOIN user_image I on U.ID = I.USER_ID WHERE ARTICLE_NO = $ARTICLE_NO";
    $dbconn = mysqli_connect("localhost","root","root","freeboard");
    $RESULT = mysqli_query($dbconn,$GET_READDATA_SQL);

    $data = mysqli_fetch_row($RESULT);

    $IMAGEPATH = substr($data[0],1);
    $NICKNAME = $data[1];
    $TEL = $data[2];
    $CONTENT = $data[3];
    $TITLE = $data[4];

    $READDATA_JSON = array(
        "IMAGEPATH" => $IMAGEPATH,
        "NICKNAME" => $NICKNAME,
        "TEL" => $TEL,
        "CONTENT" => $CONTENT,
        "TITLE" => $TITLE
    );
    mysqli_close($dbconn);
    header("Content-type: application/json; charset=utf-8");
    print(json_encode($READDATA_JSON));

}


?>