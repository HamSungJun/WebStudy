<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<!-- <?php
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
			# process a GET request
			printf("get requested");
		  } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
			# process a POST request
			printf("post requested");
			print_r($_POST);
			// print_r($_POST[COURSE]);
		  }
		  
		?>	 -->

		<?php
		# Ex 4 : 
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		# if (){
		?>

		<!-- Ex 4 : --> 
			 
		
			<?php
					$NAME = $_POST["NAME"];
					$ID = $_POST["ID"];
					$COURSES = $_POST["COURSE"];
					$GRADE = $_POST["GRADE"];
					$CARD = $_POST["CREDIT_CARD"];
					$CARD_TYPE = $_POST["CARD_TYPE"];
					
					if( !(isset($NAME) && isset($ID) && isset($COURSES) && isset($GRADE) && isset($CARD) && isset($CARD_TYPE)) ){?>
						<h1>Sorry</h1>
						<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>
					
				<?php
				# Ex 5 : 
				# Check if the name is composed of alphabets, dash(-), ora single white space.
					} elseif (!preg_match("/^[a-zA-Z]+[\-\s]?[a-zA-Z]+[\-\s]?[a-zA-Z]+$/", $_POST["NAME"]) || strpos($_POST["NAME"], "--") !== false) { 
				?>
					<h1>Sorry</h1>
					<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>
				<?php
				# Ex 5 : 
				# Check if the credit card number is composed of exactly 16 digits.
				# Check if the Visa card starts with 4 and MasterCard starts with 5. 
					} elseif ((!preg_match('/^[4][0-9]{15}/', $CARD)&& $CARD_TYPE=="Visa")||(!preg_match('/^[5][0-9]{15}/', $CARD) && $CARD_TYPE=="MasterCard")) {
								
				?>
					<h1>Sorry</h1>
					<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>
					

				<!-- Ex 5 : 
					Display the below error message : 
					<h1>Sorry</h1>
					<p>You didn't provide a valid credit card number. Try again?</p>
				--> 

				<?php
				# if all the validation and check are passed 
				} else {		
				?>

				<h1>Thanks, looser!</h1>
				<p>Your information has been recorded.</p>
				
				<!-- Ex 2: display submitted data -->
				<ul> 
					<li>Name: <?= $NAME ?> </li>
					<li>ID: <?= $ID ?>  </li>
					<!-- use the 'processCheckbox' function to display selected courses -->
					<li>Course: <?= processCheckbox($COURSES) ?></li>
					<li>Grade: <?= $GRADE ?>  </li>
					<li>Credit <?= $CARD ?> (<?= $CARD_TYPE ?>) </li>
				</ul>
				
				<!-- Ex 3 :  -->
					<p>Here are all the loosers who have submitted here:</p>
				<?php
					$filename = "loosers.txt";
					/* Ex 3: 
					* Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
					* For example, "Scott Lee;20110115238;4300523877775238;visa"
					*/
					
					// Open the file to get existing content
					$current = file_get_contents($filename);
					// Append a new person to the file
					$current .= "$NAME;$ID;$CARD;$CARD_TYPE\n";
					// Write the contents back to the file
					file_put_contents($filename, $current);
				?>
					
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
			
				<?php
					
					$lines = file("loosers.txt");
					foreach ($lines as $line ) { ?>
						<pre><?=$line?></pre>
				<?php } ?>
				<?php
				}
				?>	
				
		
				<?php
					/* Ex 2: 
					* Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
					* 
					* The function checks whether the checkbox is selected or not and 
					* collects all the selected checkboxes into a single string with comma seperation.
					* For example, "cse326, cse603, cin870"
					*/
					function processCheckbox($COURSES){
						$comma_separated = implode("," , $COURSES);
						return $comma_separated;
					}
				?>
		
	</body>
</html>
