<?php
   include('dbconfig.php');

   $panel=$_POST['pname'];

   $sql="INSERT INTO panel(panel_name)
	VALUES('$panel')";

	$status = mysqli_query($conn,$sql);

	if($status==1) {
		header("location:panel_list.php");
	}
	else {
		header("location:index.php");
	}
?>