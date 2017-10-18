<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

function  my_autoloader($class) {
	include $class . '.php';
				}
	
spl_autoload_register ('my_autoloader');

$obj= new main ();


class main {
	public function __construct() {
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
	public $html;
	public function __construct() {
		$this->html .='<html>';
		$this->html .='<linkrel="stylesheet"href="style.css">';
		$this->html .='<body>';
				
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
public function get () {
	$form = '<form enctype="multipart/form-data" action="upload.php" method="post">';
	$form .= '<input type ="file" name="fileToUpload" id="fileToUpload">';
	$form .= '<input type ="submit" value="Upload File" name="submit">';
	$form .= '</form>';
		$this->html .= '<h2>Form</h2>';
		$this->html .= $form;
}
}
?>

