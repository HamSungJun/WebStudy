<?
   include "../lib/dbconn.php";
 
   $sql = "update survey set $composer = $composer + 1";
   mysql_query($sql, $connect);

   mysql_close();

   Header("location:result.php");
?>

