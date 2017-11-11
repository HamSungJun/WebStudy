01 <?
02 	$pilgi = 65;
03      $silgi = 90;
04	$result = "불합격";
05             
06 	if($pilgi >= 70 && $silgi >= 80 )
07	{
08		$result = "합격";
09	}
10
11      echo "필기 점수 : $pilgi, 실기 점수 : $silgi<br>";
12      echo "결과 : $result";
13 ?>