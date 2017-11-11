<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
   print_r($_POST);
   echo "아이디   : $_POST[id]<br>";
   echo "이름     : $_POST[name]<br>";
   echo "비밀번호 : $passwd<br>";
   echo "비밀번호 확인 : $passwd_confirm<br>";
   echo "성별     : $gender<br>";
   echo "휴대번호 : $phone1 - $phone2 - $phone3<br>";
   echo "주소     : $address<br>";
   echo "영화감상 : $movie<br>";
   echo "독서     : $book<br>";
   echo "쇼핑     : $shop<br>";
   echo "운동     : $sport<br>";
   echo "자기소개 : $intro<br>";
   echo "제목(hidden 타입에서 전달) : $title<br>";
?>