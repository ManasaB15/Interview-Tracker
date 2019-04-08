<?php
   include('dbconfig.php');

   $role=$_POST['pname'];

   $sql="INSERT INTO panel(role_name)
	VALUES('$role')";

	$status = mysqli_query($conn,$sql);

	if($status==1) {
		header("location:panel_list.php");
	}
	else {
		header("location:index.php");
	}
?>