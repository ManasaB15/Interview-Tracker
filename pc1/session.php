<?php
   include('dbconfig.php');
   session_start();
   
   $user_check = $_SESSION['email'];
    $role_check= $_SESSION['role'];
   
   
   $ses_sql = mysqli_query($conn,"select email from user where email = '$user_check'");
   $role_sql = mysqli_query($conn,"select role_id from role where role_id = '$role_check'");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $ROLE = mysqli_fetch_array($role_sql,MYSQLI_ASSOC);

   $login_session = $row['email'];
    $role_session = $ROLE['role_id'];

          // print_r($role_session); exit;

   
   if(!isset($_SESSION['email'])) {
      header("Location:index.php");
   }

   // if($_SESSION['role'] == 2) {
   //  include("past_intervewlist.php");   	 
   // }
?>