<?php
	include("dbconfig.php");

	// if(!isset($_POST["submit"])) {
	// 	echo "not adding";
	// } 
	// else {

	$name=$_POST['cname'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$pan=$_POST['pan'];
	$te=$_POST['te'];
	$desig=$_POST['desig'];
	$fileName=$_FILES["resume"]["name"];
    $fileSize=$_FILES["resume"]["size"]/1024;
    $fileType=$_FILES["resume"]["type"];
    $fileTmpName=$_FILES["resume"]["tmp_name"]; 

    move_uploaded_file($fileTmpName,"Upload/$fileName"); 

	

	$sql="INSERT INTO candidate(candidate_name,email,mobile_no,pan_no,total_experience,designation,resume)
	VALUES('$name','$email','$mobile','$pan','$te','$desig','$fileName')";


	$status = mysqli_query($conn,$sql);

	if($status==1)
	{
		header("Location:candidate_list.php");
	}else
	{
		header("Location:candidate_list.php");
	}

    // } 
    
    


?>