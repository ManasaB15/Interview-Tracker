<?php
	include("dbconfig.php");
	$id=$_POST['id'];
	$cname=$_POST['cname'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$pan=$_POST['pan'];
	$totalex=$_POST['te'];
	$desig=$_POST['desig'];
	$resume=$_POST['resume'];
	
	
	$sql="update candidate set
						candidate_name='$cname',
						email='$email',
						mobile_no='$mobile',
						pan_no='$pan',
						total_experience='$totalex',
						designation='$desig',
						resume='$resume'
						where candidate_id='$id'";
						
	if(mysqli_query($conn,$sql)==true)
	{
		
		header("Location:candidate_list.php?candidate_id=".candidate_id);
	}
	else
	{
		
		header("Location:candidate_list.php");
	}
	
?>