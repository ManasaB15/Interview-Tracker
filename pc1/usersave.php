<?php

    session_start();
   include('dbconfig.php');
     // Return Success - Valid Email
   $hash = md5(rand(0,100) ); 
   // $password = rand(1000,5000);
    $name=$_POST['name'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$panel=$_POST['panel'];
	$role=$_POST['Role'];


    $sql="INSERT INTO user(user_name,email,password,panel_id,role_id,hash)
	VALUES('$name','$email','$password','$panel', '$role','$hash')";
	//print($sql);exit;

	// $link="<a href='setpassword.php'>"$hash"</a>";

	 $status = mysqli_query($conn,$sql);
	//echo $status;exit();
	 
	  $from = $_SESSION['email'];
	  // echo $_SESSION['email']; exit;
	  $to = $email;
     // $myToken = token_generator(10);
	  $subject = "Reset password";

	 $headers = "From:" . $from;
	
	 $message="http://interview.dev-fsit.com/setpassword.php?hash=".$hash;
	 // $message=echo "<td><a href='http://interview.dev-fsit.com/setpassword.php?user_id=$row->user_id'></a></td>";

	 $mail= mail($to, $subject, $message, $headers);
	//  if($mail){
	// 	header("location:admin_page.php");
	// 	echo "mail sent to interviewer";
	// }
	// else{
 //          echo "mail not sent";
 //   	}

	 
	if($status==1  && $mail==true)
	{
		header("Location:interviewer_list.php");
		echo "mail sent";
	}else
	{
		header("Location:index.php");
		echo "mail not sent";
	}
	
?> 


