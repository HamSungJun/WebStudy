<?
// print_r($_FILES['file_arr']);
print ($_FILES['file_arr']['tmp_name'][0]."러러"."../profile_img/".$_FILES['file_arr']['name'][0]);

$sourcePath = $_FILES['file_arr']['tmp_name'][0];       // Storing source path of the file in a variable
$targetPath = "../profile_img/".$_FILES['file_arr']['name'][0]; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file
?>