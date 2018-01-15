<?

$USERNAME = 'root';
$PASSWORD = 'root';
$DSN = 'mysql:host=localhost;dbname=parking_lot';

try{   
$MYSQL_PDO = new PDO($DSN,$USERNAME,$PASSWORD);
$MYSQL_PDO->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    echo "데이터베이스 연결하였다.";

   $result = $MYSQL_PDO->query("SELECT * FROM PARKING_LOT",PDO::FETCH_ASSOC);
   foreach ($result as $row) {

       print($row["P_LOT_NAME"]);
       print($row["IS_FREE"]);
       print($row["IS_INOUTSIDE"]);
       print($row["TOTAL_SPACE"]);
       print($row["USING_SPACE"]);

   };

   $MYSQL_PDO->beginTransaction();
   $INSERT_SQL = "INSERT INTO parking_lot VALUES(:P_LOT_NAME , :IS_FREE , :IS_INOUTSIDE ,:TOTAL_SPACE , :USING_SPACE)";

   $STMT = $MYSQL_PDO->prepare($INSERT_SQL);

   $STMT->bindValue(':P_LOT_NAME',$_POST["P_LOT_NAME"],PDO::PARAM_STR);
   $STMT->bindValue(':P_LOT_NAME',$_POST["P_LOT_NAME"],PDO::PARAM_STR);
   $STMT->bindValue(':P_LOT_NAME',$_POST["P_LOT_NAME"],PDO::PARAM_STR);
   $STMT->bindValue(':P_LOT_NAME',$_POST["P_LOT_NAME"],PDO::PARAM_INT);
   $STMT->bindValue(':P_LOT_NAME',$_POST["P_LOT_NAME"],PDO::PARAM_INT);

   $STMT->execute();
   $MYSQL_PDO->commit();

   print("데이터를".$STMT->rowCount()."건 입력하였다.");

}
catch(PDOException $e){
    
    echo $e->getMessage();
    $MYSQL_PDO->rollBack();

}
?>