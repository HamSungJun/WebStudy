<?

$ARTICLE_NO = $_POST["ARTICLE_NO"];
if ($ARTICLE_NO < 0) {
    print("<script>alert('내부 서버 오류! 잠시후에 이용해주세요.');</script>");
}
else {
    $dbconn = mysqli_connect("localhost","wleo12345","tjdwns12","wleo12345");

    $GET_READDATA_SQL = "SELECT I.IMAGE_PATH , U.NICKNAME , U.TEL , A.CONTENT , A.TITLE FROM User U JOIN Article A ON U.ID = A.USER_ID JOIN User_Image I on U.ID = I.USER_ID WHERE ARTICLE_NO = $ARTICLE_NO";
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
        "TITLE" => $TITLE,
        "ARTICLE_NO" => $ARTICLE_NO,
        "REPLY_NICKNAME" => array(),
        "REPLY_CONTENT" => array(),
        "REPLY_CREATION_TIME" => array()
    );

    $GET_READDATA_REPLY_SQL = "SELECT NICKNAME , CONTENT , CREATION_TIME FROM Article_Reply WHERE ARTICLE_NO = $ARTICLE_NO ORDER BY REPLY_NO ASC";
    $REPLY_RESULT = mysqli_query($dbconn,$GET_READDATA_REPLY_SQL); 

    while ($REPLY_DATA = mysqli_fetch_assoc($REPLY_RESULT)) {
        array_push($READDATA_JSON["REPLY_NICKNAME"],$REPLY_DATA["NICKNAME"]);
        array_push($READDATA_JSON["REPLY_CONTENT"],$REPLY_DATA["CONTENT"]);
        array_push($READDATA_JSON["REPLY_CREATION_TIME"],$REPLY_DATA["CREATION_TIME"]);
    };

    mysqli_close($dbconn);
    header("Content-type: application/json; charset=utf-8");
    print(json_encode($READDATA_JSON));

}


?>