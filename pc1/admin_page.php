<?php
  include('dbconfig.php');
  include('session.php');

   if(!isset($_SESSION['email'])) {
  $_SESSION['msg']="you first login";
     header('location:index.php');
   }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <style>
  
  .img1{background-image: url('wave-background.png'); background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;}
    .navbar{background-image: url('blue-green-gradient-web-design-trends.jpg');}
  
    
  </style>

</head>
<body class="img1">

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header text">
      <a class="navbar-brand " style="color:white;">Interview Tracker</a>
    </div>
    <ul class="nav navbar-nav">
      <!--<li class="active"><a href="form2.php">Schedule Interview</a></li>-->
     </ul>  
        
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="logout.php"  style="color:white;"><span class="glyphicon glyphicon-log-out"></span> &nbspLogout</a></li>
    </ul>
  </div>
</nav>


   

  
<div class="container-fluid">

  <div class="row">
      <div class="col-sm-4">
         <?php if($_SESSION['role'] == '1') { ?>
            <div class="list-group">
             <a href="#" class="list-group-item active glyphicon glyphicon-user" style="background-color:#00cc99;">&nbsp;Admin</a>
             <a href="dashboard.php" class="list-group-item active glyphicon glyphicon-eye-open">&nbsp;Dashboard</a>
            <a href="candidate_list.php" class="list-group-item glyphicon glyphicon-list" >&nbsp;Candidate List</a>
            <a href="interviewer_list.php" class="list-group-item glyphicon glyphicon-list">&nbsp;Interviewer List</a>
            <a href="panel_list.php"  class="list-group-item glyphicon glyphicon-list">&nbsp;Panel List</a>
            <a href="schedule_interviewlist.php"  class="list-group-item glyphicon glyphicon-list">&nbsp;Schedule Interview List</a>
          </div>
        <?php }
        else { ?>
           <div class="list-group">

            <a href="interviewer_list.php" class="list-group-item active glyphicon glyphicon-user">&nbsp;Interviewer</a>
            <a href="upcoming_interviewlist.php"  class="list-group-item glyphicon glyphicon-list">&nbsp;Upcoming Interview List</a>
            <a href="past_interviewlist.php"  class="list-group-item  glyphicon glyphicon-list">&nbsp;Past Interview List</a>
          </div>
        <?php } ?>

      </div>
      

  