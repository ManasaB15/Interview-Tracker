<?php

   session_start();

   include('dbconfig.php');

   $level=$_POST['level'];
   $status = $_POST['status'];
   $comment=$_POST['comment'];
   $rating=$_POST['rating'];
   $type=$_POST['toi'];
   $job=$_POST['job'];

   $emaillist1 ="SELECT panel_id from schedule_interview where schedule_id='".$job."'";

	 $res1=mysqli_query($conn,$emaillist1);

	while($row1=mysqli_fetch_assoc($res1)) {
	   $panel= $row1['panel_id'];
	}
	    



   $sql="INSERT INTO update_status (level, type_of_interview,status,comments,rating,schedule_id)
	    VALUES('$level','$type','$status','$comment','$rating','$job')";

	$status = mysqli_query($conn,$sql);

	// $last_id = mysqli_insert_id($conn);
	// $_SESSION['lastid']=$last_id;

	$email=$_SESSION['email'];
	
   
    
      $emaillist="SELECT * from user where panel_id='".$panel."' || role_id=1";
       	$res=mysqli_query($conn,$emaillist);
	   	 // while($row=mysqli_fetch_assoc($res)) {

	   	 $from=$email;
	   
	     // $to=$row['email'];
	     $to="mohanraj.gr@fortunesoftit.com";
	    

	     
	    $subject="Interview status";
	    $header="From:".$from;
	     $headers .="MIME-Version: 1.0\r\n" 
                  . "Content-Type: text/html; charset=\"iso-8859-1\"\r\n" 
                  . "Content-Transfer-Encoding: 7bit\r\n";


	   
	    $message= "Status updated - Level : $level, Status : $status, Comments : $comment, Rating : $rating, Type of interviw : $type" ;
	                
	    $mail=mail($to,$subject,$header,$message);
	     
	      // } 
	      
	      

	if($status==1 && $mail==1 ) {
		header("Location:upcoming_interviewlist.php");
		
		echo "<script type=\'text/javascript\'>window.alert('mail sent.');</script>"; 
	
	}
	else {
		header("Location:upcoming_interviewlist.php");
	}
?>