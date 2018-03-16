<?
session_start();

$dbconn = mysqli_connect("localhost","wleo12345","tjdwns12","wleo12345");

$ARTICLE_SQL = "SELECT ARTICLE_NO, NICKNAME, TITLE, CREATION_TIME FROM Article A JOIN User U ON A.USER_ID = U.ID order by ARTICLE_NO DESC";

$RESULT = mysqli_query($dbconn,$ARTICLE_SQL);

$ARTICLE_JSON = array(
    "ARTICLE_NO" => array(),
    "NICKNAME" => array(),
    "TITLE" => array(),
    "CREATION_TIME" => array()
);

while ($data = mysqli_fetch_assoc($RESULT)) {
    
    array_push($ARTICLE_JSON["ARTICLE_NO"],$data["ARTICLE_NO"]);
    array_push($ARTICLE_JSON["NICKNAME"],$data["NICKNAME"]);
    array_push($ARTICLE_JSON["TITLE"],$data["TITLE"]);
    array_push($ARTICLE_JSON["CREATION_TIME"],$data["CREATION_TIME"]);

};

header("Content-type: application/json; charset=utf-8");
print(json_encode($ARTICLE_JSON));

?>