<!DOCTYPE html>
<!-- 2013041007 함성준 화요일 09시 -->
<html>
	<head>
		<title>Q1. Forms</title>
		<style type="text/css">
			span {color: blue;}
			img {float:left; height:100px; margin-right:30px}
		</style>
	</head>
	<?php
		if (!isset($_POST["sname"]) || !isset($_POST["sid"]) || !isset($_POST["dob"])  || !isset($_POST["email"]) || 
		    !isset($_POST["sclass"]) || !isset($_POST["favoriteChapter"]) || !isset($_POST["diffLab"]) || !isset($_POST["comments"])){
			header("HTTP/1.1 400 Invalid Request");
		    die("HTTP/1.1 400 Invalid Request - you have submitted incomplete form.");
		}
		
		$name = $_POST["sname"];
		$sid = $_POST["sid"];
		$fc = $_POST["favoriteChapter"];
		
		/* Validate the parameter 'sname', so that it can only consists of alphabets, dash(-), and white space
		 * (Use regular expression to validate!)
		 * Set the header to "Invalid Request", kill the process, and return an appropriate message 
		 * (HTTP/1.1 400 Invalid Request - your input for Name is invalid.)
		 */
		 /* 'sname' parameter의 유효성을 검사하여 알파벳, 대시(-) 및 공백으로만 구성 될 수 있도록하시오.
		 * (정규 표현식을 사용하여 유효성을 검사하십시오!)
		 * 헤더를 "Invalid Request"로 설정하고 프로세스를 종료하고 적절한 메시지를 반환하시오.
		 * (HTTP/1.1 400 Invalid Request - your input for Name is invalid.)
		 */    
		if (!preg_match("/^[a-zA-Z\-\s]+$/" , $name)) {
			header("HTTP/1.1 400 Invalid Request");
		    die("HTTP/1.1 400 Invalid Request - your input for Name is invalid.");						
		}
		/* Validate the parameter 'sid', so that it can only be made up of 10 digits
		 * (Use regular expression to validate!)
		 * Set the header to "Invalid Request", kill the process, and return an appropriate message 
		 * (HTTP/1.1 400 Invalid Request - your input for Student ID is invalid.)
		 */  
		/* 'sid' parameter의 유효성을 검사하여 10자리 숫자로만 구성 될 수 있도록하시오.
		 * (정규 표현식을 사용하여 유효성을 검사하십시오!)
		 * 헤더를 "Invalid Request"로 설정하고 프로세스를 종료하고 적절한 메시지를 반환하시오.
		 * (HTTP/1.1 400 Invalid Request - your input for Student ID is invalid.)
		 */ 
		if (!preg_match("/^[0-9]{10}$/" ,$sid)) {
			header("HTTP/1.1 400 Invalid Request");
		    die("HTTP/1.1 400 Invalid Request - your input for Student ID is invalid.");
		} 
		
		/* Validate the parameter 'favoriteChapter', so that it can contain no more than 3 options
		 * Set the header to "Invalid Request", kill the process, and return an appropriate message 
		 * (HTTP/1.1 400 Invalid Request -  You have selected more than 3 favorite chapters.)
		 */ 
		/* 'favoriteChapter' parameter의 유효성을 검사하여 3 option 이상 포함하지 않도록하시오.
		 * 헤더를 "Invalid Request"로 설정하고 프로세스를 종료하고 적절한 메시지를 반환하시오.
		 * (HTTP/1.1 400 Invalid Request - You have selected more than 3 favorite chapters.)
		 */
		if (count($fc) > 3) {
			header("HTTP/1.1 400 Invalid Request");
		    die("HTTP/1.1 400 Invalid Request - You have selected more than 3 favorite chapters.");	
		}
		
		/* Save the uploaded photo as "$sid.jpg"
		 * for example, if user uploads "photo.jpg" it should be saved as "2011010528.jpg" 
		 * to root directory where 'forms.html' and 'formProcessor.php' are located
		 * 
		 * Initially check if the file is uploaded sucessfully or not
		 */
		/* 업로드 된 사진을 "$sid.jpg" 형식으로 저장하시오.
		 * 예를 들어 사용자가 "photo.jpg" 사진을 업로드하면 'forms.html'과 'formProcessor.php'이 있는 root 디렉터리에 "2011010528.jpg"로 저장되어야 함
		 * 초기에 파일이 제대로 업로드 되었는지 여부를 체크하시오
		 */
		// if (){
		// 	//if the file already exists delete the existing file first	
		// 	//만약 파일이 이미 존제한다면 기존 파일을 먼저 삭제하시오
		// 	if (file_exists("$sid.jpg")){
		// 		unlink("$sid.jpg");
		// 	}
		// 	//save the file as as "$sid.jpg"
		// 	//파일을 "$sid.jpg" 형식으로 저장하시오
			
		// }
		
		$ia = array(); 
		// If checkboxes with names "lab" is checked, store the associated value
		// "lab" 이라는 name을 가진 checkbox가 선택되면 해당 값을 저장하시오    
		if (isset($_POST["lab"]) == true){
			$ia[] = "Laboratory";
		}
		// If checkboxes with names "project" is checked, store the associated value
		// "project" 이라는 name을 가진 checkbox가 선택되면 해당 값을 저장하시오 
		if (isset($_POST["project"]) == true){
			$ia[] = "Team Project";
		}
		// If checkboxes with names "exam" is checked, store the associated value
		// "exam" 이라는 name을 가진 checkbox가 선택되면 해당 값을 저장하시오 
		if (isset($_POST["exam"]) == true){
			$ia[] = "Exam";
		}
		
		function processArray($array) {
			$s = "$array[0]";	
			for($i=1; $i < count($array); $i++){
				$s .= ", ".$array[$i];
			}
			return $s;
		}
    ?>
	<body>
		<h1>Survey Summary</h1>
		<h2>Student Information</h2>
		<img src="<?=$sid?>.jpg" alt="<?=$name?>"/>
		<ul>
			<li>Name: <span><?= $name ?></span></li>
			<li>Student ID: <span><?= $sid ?></span></li>
			<li>Date of Birth: <span><?= $_POST["dob"] ?></span></li>
			<li>Email: <span><?= $_POST["email"] ?></span></li>
			<li>Class: <span><?= $_POST["sclass"] ?></span></li>		 
		</ul>		
		<h2>Course Evaluation Survey:</h2>
		<ul>
			<li>3 Favorite chapters: <span><?= processArray($fc) ?></span></li>
			<li>The most difficult lab session: <span><?= $_POST["diffLab"] ?></span></li>
			<li>Inappropriate assessment method: <span><?= processArray($ia) ?></span></li>
			<li>Additional Comments: <span><?= $_POST["comments"]?></span></li>
		</ul>
	</body>
</html>
