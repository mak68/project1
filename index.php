<?php
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//activate autoloader function
function  my_autoloader($class) {
	include $class . '.php';
				}
	
spl_autoload_register ('my_autoloader');

//Instantiate the program  object
$obj= new main ();

//start main class 
class main {
	
	public function __construct() {
	
	//Set default for page request and load the page
	$pageRequest = 'upload';
	if(isset($_REQUEST['page'])) {
		$pageRequest = $_REQUEST['page'];
		}
	
	$page = new $pageRequest;

	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$page->get();
	} else {
		$page->post();
		}
	}
}

abstract class page {

	//create html and add edits to the page
	public $html;
	
	public function __construct() {
		
		$this->html .='<html>';
		$this->html .='<link rel="stylesheet" type="text/css"
		href="style.css"/>';
		$this->html .='<body>';
				
		//get and print html table		
		}
	public function __destruct() {
	
		$this->html .= '</body></html>';
	stringFunctions:: printThis($this->html);
	}

	public function get() {
			echo 'default';
				}


	public function post () {
		print_r($POST);
		}

}


class upload extends page {

//create the form allowing to upload the file
public function get () {
	$form = '<form enctype="multipart/form-data" action="upload.php" method="post">';
	$form .= '<input type ="file" name="fileToUpload" id="fileToUpload">';
	$form .= '<input type ="submit" value="Upload File" name="submit">';
	$form .= '</form>';
		$this->html .= '<h2>Upload the File Below</h2>';
		$this->html .= $form;
	}
}
?>
