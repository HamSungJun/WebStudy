<!DOCTYPE html>
<html lang="">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
                
        <?php
             echo($_SERVER['HTTP_USER_AGENT']); 
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'AppleWebKit') !== FALSE) {
                echo 'Chrome를 사용하고 있습니다.<br />';
            }
        ?>

    </body>
</html>