<?php
	include("dbconfig.php");
	$id=$_POST['id'];
	$pname=$_POST['pname'];
	
	
	$sql="update panel set
						panel_name='$pname'
						 where panel_id='$id'";
						
	if(mysqli_query($conn,$sql)==true)
	{
		
		header("Location:viewPanel.php?panel_id=".panel_id);
	}
	else
	{
		
		header("Location:panel_list.php");
	}
	
?>