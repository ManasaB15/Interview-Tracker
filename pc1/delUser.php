<?php
	include("dbconfig.php");

	session_start();
	$_SESSION["errormsg"]='Record deleted successfully..';
	$error = $_SESSION["errormsg"];

	$userId=$_GET['user_id'];
	$sql="delete from user where user_id='$userId'";
	$res=mysqli_query($conn,$sql);
	if($res==true) {
		header("Location:interviewer_list.php");
		
	}
	else {

		header("Location:interviewer_list.php");
	}
?>