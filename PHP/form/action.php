<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
            echo htmlspecialchars($_POST['name']); ?>씨 안녕하세요.
            당신은 <?php echo (int)$_POST['age']; ?>세입니다.
        ?>
    </body>
</html>