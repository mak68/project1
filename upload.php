<?php 

ini_set('display_errors','On');
error_reporting (E_ALL);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$fileName = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;


if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    }

if($imageFileType != "csv") {
echo "Sorry, incorrect file  type";
  $uploadOk = 0; 
   }


if ($uploadOk == 0) {
echo "Sorry, something went wrong";
 }  else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header ("location:https://web.njit.edu/~mak68/project1?page=htmlTable&fileName=".$fileName);
 
    } else {
            echo "Sorry, there was an error.";
	        }
}
?>

