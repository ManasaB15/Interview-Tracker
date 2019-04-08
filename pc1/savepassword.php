<?php
	include("dbconfig.php");
	// session_start();
	$hash=$_POST['hash'];
	// print_r($id); exit;
	$password=md5($_POST['password']);
	// print_r($password); exit;
	
	
	
	// $sql="update user set password='".$password."' where user_id='".$id."'";
        $sql="UPDATE `user` SET `password`='".$password."', `active`='1' WHERE `hash`='".$hash."'";


	//print_r($sql);exit;
						
	if(mysqli_query($conn,$sql)==true)
	{
		
		header("Location:index.php?user_id=".user_id);
	}
	else
	{
		
		echo "please try again";
	}
	
?>