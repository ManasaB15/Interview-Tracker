<?php 
   include('dbconfig.php');
   include('session.php');
   session_start();
   // echo $_SESSION['email']; exit;
   if(isset($_SESSION['email'])) {
     header('location:admin_page.php');
   } 
   else {
   	$_SESSION['msg']="you first login";
   	header('location:login.php');
  }


?> 
