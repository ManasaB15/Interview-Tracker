<?php
	include("dbconfig.php");

	session_start();
	$_SESSION["errormsg"]='Record deleted successfully..';
	$error = $_SESSION["errormsg"];

	$scheduleId=$_GET['schedule_id'];
	$sql="delete from schedule_interview where schedule_id='$scheduleId'";
	//print_r($sql);exit;
	$res=mysqli_query($conn,$sql);
	//print_r($res);exit;
	if($res==true) {
		header("Location:schedule_interviewlist.php");
		
	}
	else {

		header("Location:schedule_interviewlist.php");
	}
?>