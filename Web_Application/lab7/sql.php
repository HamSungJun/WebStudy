<!DOCTYPE html>
<html lang="ko">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="css/style.css" rel="stylesheet"> -->
       
    </head>
    <body>

    
    <h1>DATABASE CONTROLLER</h1>

    <form action="sql.php" id="user_Input" method="POST">
        WHAT DB?<input type="text" name="DBNAME">
        WHAT QUERY?<input type="text" name="QUERY">
       <input type="submit">
    </form>

    <?

    $DBNAME = $_POST["DBNAME"];
    $DBQUERY = $_POST["QUERY"];

    // Ex.8
    if (isset($DBNAME) && isset($DBQUERY) == true){
    try {
        $db = new PDO("mysql:dbname=$DBNAME;host=localhost", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query_result = $db->query("$DBQUERY");
        $output = "";
        // print_r($query_result);
        foreach ($query_result as $result) {
            // print_r($result);
            
            for ($i=0; $i < count($result)/2 ; $i++) {

                $output .= $result[$i];
                  
            } ?>
            <li><?= $output ?></li>
            <?$output = "";
         }; 
    } catch (PDOException $ex) {
        ?>
        <p>Sorry, a database error occurred. Please try again later.</p>
        <p>(Error details: <?= $ex->getMessage() ?>)</p>
        <?php
    }
}
    ?>
    <ul>

                
        <?
   
        ?>
        
    
    </ul>
    
        
    </body>
</html>