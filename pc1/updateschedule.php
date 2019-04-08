<?php
	include("dbconfig.php");
	$id=$_POST['id'];
	// print_r($id); exit;

	$cname=$_POST['name'];
	$email=$_POST['email'];
	$date=$_POST['date'];
	$job=$_POST['job'];
	$toi=$_POST['toi'];
	$panel=$_POST['panel'];
	
	
	$sql="update schedule_interview set
						email='$email',
						date_time='$date',
						job_title='$job',
						type_of_interview='$toi',
						candidate_id='$cname',
						panel_id='$panel'
						where schedule_id='$id'";

						
	if(mysqli_query($conn,$sql)==true)
	{
		
		header("Location:schedule_interviewlist.php?schedule_id=".schedule_id);
	}
	else
	{
		
		header("Location:schedule_interviewlist.php");
	}
	
?>