<?php
	include("dbconfig.php");

	session_start();
	$_SESSION["errormsg"]='Record deleted successfully..';
	$error = $_SESSION["errormsg"];

	$panelId=$_GET['panel_id'];
	$sql="delete from panel where panel_id='$panelId'";

	$res=mysqli_query($conn,$sql);
	// print_r($res); exit; 

	if($res==true) {
		header("Location:panel_list.php");
		
	}
	else {

		header("Location:panel_list.php");
	}
?>