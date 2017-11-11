    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?
    $db = new PDO("mysql:dbname=hsj_db;host=localhost", "HSJPRIME", "HSJPRIME");
    $db->query("drop table biz_card");
    $db->query("insert into language_trend (num , language , 1q , 2q , 3q , 4q , status , lastrank) values(31,'HSJ',0.1,0.1,0.1,0.1,'C',33)");

    $query_result = $db->query("select * from language_trend");?>
    <table style="text-align : center" border="1">
    <tr><th>num</th><th>language</th><th>1q</th><th>2q</th><th>3q</th><th>4q</th><th>status</th><th>last lank</th></tr>
    <?foreach ($query_result as $result) {?>
    <tr>
    <td><?= $result["num"] ?></td>
    <td><?= $result["language"]?></td>
    <td><?= $result["1q"]?></td>
    <td><?= $result["2q"]?></td>
    <td><?= $result["3q"]?></td>
    <td><?= $result["4q"]?></td>
    <td><?= $result["status"]?></td>
    <td><?= $result["lastrank"]?></td>
    </tr>   
    <?}
    ?>