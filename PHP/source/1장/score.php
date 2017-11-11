<html>
<head>
<title>5과목의 합계/평균</title>
</head>
<body>
<?
    $kor  = 80;
    $eng  = 70;
    $math = 90;
    $soc  = 75;
    $sci  = 95;

    $sum  = $kor + $eng + $math + $soc + $sci;
    $avg  = $sum/5;

    echo "
	<table border='1'>
	<tr><td>국어 : $kor</td></tr>
	<tr><td>국어 : $kor</td></tr>
	<tr><td>국어 : $kor</td></tr>
	<tr><td>국어 : $kor</td></tr>
	<tr><td>국어 : $kor</td></tr>
	<tr><td>국어 : $kor</td></tr>
	<tr><td>국어 : $kor</td></tr>
	</table>
	";
?>
<body>
</html>