<?php
	include("dbconfig.php");
	session_start();

	
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password=md5($password);
		  // echo $email;
		 // echo $password;
	
	$sql="SELECT * FROM user WHERE email='".$email."' and password='".$password."'";
	// print_r($sql); exit;
		
	$status=mysqli_query($conn,$sql);
	 // print_r($status); exit;

	 $row=mysqli_fetch_array($status);
	 // print_r($row); exit;
	
		$_SESSION['id']=$row['user_id'];
		$_SESSION['role']=$row['role_id'];
		$_SESSION['email']=$email;
		$count=mysqli_num_rows($status);
		 // print_r($count); exit;
		if($count==1)
		{
					if ($row['role_id']=="1")
					{ 
		 
		                 header ("location: admin_page.php"); 
		                             
					}
					else if ($row['role_id']=="2")
					{ 
						$_SESSION['role']=$row['role_id'];
		 
		                header ("location: admin_page.php"); 
		                             
		 
					}
		}
		else 
		{
		echo "Your Login Name or Password is invalid";
		}
		
	

?>		