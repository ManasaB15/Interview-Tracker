<?php
  include('admin_page.php');
  include('dbconfig.php');
   $date= date("y/m/d h:m:s");
  ?>

  <style>
      .fa{color:#00cc99;}
      .div1{width: 150px;height: 150px;background-color: white;margin-bottom: 100px;border:1px solid grey;box-shadow: 5px 10px#00cc99;}  
  </style>


<div class="col-sm-8">
                        <?php 
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `candidate`");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                            $result1 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `panel`");
                            $row1 = mysqli_fetch_array($result1);
                            $count1 = $row1['count'];
                            $result2 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `schedule_interview`");
                            $row2 = mysqli_fetch_array($result2);
                            $count2 = $row2['count'];
                            $result3 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `schedule_interview` where date_time >= '".$date."'");
                            $row3 = mysqli_fetch_array($result3);
                            $count3 = $row3['count'];
                            $result4 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `schedule_interview` where date_time <= '".$date."'");
                            $row4 = mysqli_fetch_array($result4);
                            $count4 = $row4['count'];
                            $result5 = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `user`");
                            $row5 = mysqli_fetch_array($result5);
                            $count5 = $row5['count'];
                                
                         ?>

          <h3 class="text-center">Dashboard</h3>
          <br>
          <div class="row">
            <div class="col-sm-4">
              <div class="div1">
                <h4 class="text-center">Total Candidates</h4>
                <center><i class="fa fa-user fa-4x"></i></center>
                <center><i style="font-size:30px;"><?php echo $count ; ?> </i></center>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="div1">
                 <h4 class="text-center">Total panel</h4>
                <center><i class="fa fa-book fa-4x"></i></center>
                <center><i style="font-size:30px;"><?php echo $count1 ; ?> </i></center>
   
              </div>
            </div>
            <div class="col-sm-4">
              <div class="div1">
                <h4 class="text-center">Scheduled Interviews</h4>
                <center><i class="fa fa-calendar fa-4x"></i></center>
                <center><i style="font-size:30px;"><?php echo $count2 ; ?> </i></center>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="div1">
                <h4 class="text-center">Upcoming Interviews</h4>
                <center><i class="fa fa-handshake-o fa-4x" ></i></center>
                <center><i style="font-size:30px;"><?php echo $count3 ; ?> </i></center>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="div1">
                <h4 class="text-center">Past Interviews</h4>
                <center><i class="fa fa-list-alt fa-4x"></i></center>
                <center><i style="font-size:30px;"><?php echo $count4 ; ?> </i></center>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="div1">
                <h4 class="text-center">Total Users</h4>
                <center><i class="fa fa-users fa-4x"></i></center>
                <center><i style="font-size:30px;"><?php echo $count5; ?> </i></center>
              </div>
            </div>
            
          </div>
        
      </div>
  </div>
</div>
