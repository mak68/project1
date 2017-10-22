<?php 

//turn on debuggin messages
ini_set('display_errors','On');
error_reporting (E_ALL);

//uploading the file
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$fileName = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

//Check if file exists 
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    }
//check if file has the righr format
if($imageFileType != "csv") {
echo "Sorry, incorrect file  type";
  $uploadOk = 0; 
   }

//check if upload was set to 0
if ($uploadOk == 0) {
echo "Sorry, something went wrong";
 }  else {
 //upload the file
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header ("location:https://web.njit.edu/~mak68/project1?page=htmlTable&fileName=".$fileName);
 
    } else {
    //in case of errors display this message
            echo "Sorry, there was an error.";
	        }
}
?>
