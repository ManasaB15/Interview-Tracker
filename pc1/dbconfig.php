<?php

	$conn=mysqli_connect("localhost","root","","interview_tracker");

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	// echo "success";
?>
