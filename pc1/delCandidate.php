<?php
	include("dbconfig.php");

	session_start();
	$_SESSION["errormsg"]='Record deleted successfully..';
	$error = $_SESSION["errormsg"];

	$candidateId=$_GET['candidate_id'];
	$sql="delete from candidate where candidate_id='$candidateId'";
	$res=mysqli_query($conn,$sql);
	if($res==true) {
		header("Location:candidate_list.php");
		
	}
	else {

		header("Location:candidate_list.php");
	}
?>