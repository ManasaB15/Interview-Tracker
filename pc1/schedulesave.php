<?php
   session_start();
   include('dbconfig.php');

   $id=$_POST['name'];
   // $email=$_POST['email'];
   $date = $_POST['date'];
   $jobt=$_POST['job'];
   // echo $jobt; exit;
   $panel=$_POST['panel'];
   $type=$_POST['toi'];
   // $panel=($row['panel_id']);
   // $cand=$_GET['candidate_id'];

   $sql="INSERT INTO schedule_interview (job_title,type_of_interview,date_time,panel_id,candidate_id)
	    VALUES('$jobt','$type','$date','$panel','$id')";
	$status = mysqli_query($conn,$sql);

	    $from=$_SESSION['email'];
	    
	    
	     $emaillist1 ="SELECT candidate_name from candidate where candidate_id='".$id."'";
	    
	    // $candidate= $row['candidate_name'];
	    	    	    // echo $res; exit;

	    $res1=mysqli_query($conn,$emaillist1);
	    while($row1=mysqli_fetch_assoc($res1)) {
	    	$candidate= $row1['candidate_name'];
	    }
	    

	     // print_r($res1); exit;
       
        // print_r($row); exit;
       	$emaillist="SELECT * from user where panel_id='".$panel."'";
       	$res=mysqli_query($conn,$emaillist);
	   	while($row=mysqli_fetch_assoc($res)) {
	    // while()
	    $to=$row['email'];

	     //print_r($to);
	    //echo"hello";
	    
	    $subject="Scheduled Interview";
	    $header="From:".$from;

	     $message="job title is : $jobt , date time is: $date , Type of interview is: $type , candidate name: $candidate" ;
	    // echo $message; exit;
                        // 'date time : {$row['date_time']} <br><br>';" 
       // $message = $row['message'];              
	    $mail=mail($to,$subject,$header,$message);
	     }

	    if($status==1  && $mail==true)
		{
			header("Location:schedule_interviewlist.php");
			// echo "mail sent";
		}else
		{
			header("Location:index.php");
			// echo "mail not sent";
		}
		    

	
	

	/*if($status==1) {
		header("location:schedule_interviewlist.php");
	}
	else {
		header("location:schedule_interviewlist.php");
	}*/
?>