<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == "lto_report"){
	$save = $crud->lto_report();
	if($save)
		echo $save;
}
ob_end_flush();

?>