<?php
	include("dbconfig.php");
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$panel=$_POST['panel'];
	
	
	$sql="update user set
						user_name='$name',
						email='$email',
						panel_id='$panel'
						where user_id='$id'";

	//print_r($sql);exit;
						
	if(mysqli_query($conn,$sql)==true)
	{
		
		header("Location:interviewer_list.php?user_id=".user_id);
	}
	else
	{
		
		header("Location:interviewer_list.php");
	}
	
?>