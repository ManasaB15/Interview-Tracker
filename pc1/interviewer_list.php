<?php
   include("admin_page.php");
   
   include("dbconfig.php");
   
   
   	if (isset($_GET['pageno'])) {
              $pageno = $_GET['pageno'];
          } else {
              $pageno = 1;
          }
          $no_of_records_per_page = 10;
          $offset = ($pageno-1) * $no_of_records_per_page;
   
          $total_pages_sql = "SELECT COUNT(*) FROM user";
          $result = mysqli_query($conn,$total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);
   
   
   $sql = "select * from user order by user_id desc LIMIT $offset, $no_of_records_per_page";
   $result = mysqli_query($conn, $sql);
   
   ?>
<?php if($_SESSION['role'] == '1') { ?>
<div class="col-sm-8">
   <h3 class="text-center">Interviewer List</h3>
   <div class="row">
      <div class="col-sm-4">
          <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#interview"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Interviewer</button>
       </div>
       <div class="col-sm-4"></div>
       <div class="col-sm-4">
          <form action="interviewer_list.php" method="POST" >
              <input id="search" name="search" type="search" placeholder="Type interviewer name here" class="form-control">
              <button id="btn" name="button" class="glyphicon glyphicon-search" style="float: right;margin-top:-35px;height:33px;"></button>
          </form>
       </div>
      </div>
   <!-- Modal -->
   <div class="modal fade" id="interview" role="dialog">
      <div class="modal-dialog modal-sm">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"> Add Interviewer</h4>
            </div>
            <div class="modal-body bg-info">
               <form action="usersave.php" method="post" name="myform" id="form2" id="theform">
                  <div class="form-group">
                     <label>Interviewer Name</label>
                     <input type="text" name="name" id="fname" class="form-control">
                     <i id="fnameerror"></i>
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" name="email" id="email" class="form-control">
                     <i id="emailerror"></i>
                  </div>
                  <div class="form-group">
                     <label>Panel Name</label>
                     <!-- <input type="text" name="panel" id="panel" class="form-control"> -->
                     <select class="form-control" id="panel" name="panel">
                        <option value="">--Choose Panel--</option>
                        <?php
                           $sql="select * from panel";
                           $res=mysqli_query($conn,$sql);
                           while($row=mysqli_fetch_assoc($res))
                           {
                           ?>
                        <option value = "<?php echo($row['panel_id'])?>" >
                           <?php echo($row['panel_name']) ?>
                        </option>
                        <?php
                           }
                           ?>
                     </select>
                     <i id="panelerror"></i>
                  </div>
                  <div class="form-group">
                     <label>Role Name</label>
                     <!-- <input type="text" name="panel" id="panel" class="form-control"> -->
                     <select class="form-control" id="role" name="Role">
                        <option value="">--Choose Role--</option>
                        <?php
                           $sql="select * from role";
                           $res=mysqli_query($conn,$sql);
                           while($row=mysqli_fetch_assoc($res))
                           {
                           ?>
                        <option value = "<?php echo($row['role_id'])?>" >
                           <?php echo($row['role_name']) ?>
                        </option>
                        <?php
                           }
                           ?>
                     </select>
                     <i id="roleerror"></i>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" id="password" class="form-control" placeholder="Please enter atleast 8 characters">
                     <i id="passworderror"></i>
                  </div>
                  <div class="form-group text-center">
                     <button type="submit" class="btn btn-primary" id="btnsubmit">Add</button>
                     <button type="reset" class="btn btn-warning">Clear</button>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
   <br><br>

   <?php
     
      if(isset($_POST['button'])) {
        $search=$_POST['search'];

        $sql1="SELECT * FROM user WHERE user_name LIKE '$search'";
        $result1=mysqli_query($conn,$sql1);
        $rowcount=mysqli_num_rows($result1);
        if($rowcount==0){
          echo "Sorry no records found";
        }
        else { ?>
          <p>Search Result</p>  
   <div class="table-responsive">
      <table class="table table-borderd">
         <tr class="btn-info">
            <th>Interviewer Name </th>
            <th> Email </th>
            <th> Panel Name</th>
            <th>Edit</th>
            <th>Delete</th>
         </tr>
         <?php
            while($row1 = mysqli_fetch_object($result1))
            {
              echo "<tr>";
              echo "<td> $row1->user_name </td>";
              echo "<td> $row1->email </td>";
              $sql4="select * from panel where panel_id=$row1->panel_id";
             $result2=mysqli_query($conn, $sql4);
             while($row4=mysqli_fetch_object($result2))
             {
            echo "<td> $row4->panel_name</td>";
             }
            
              
               echo "<td><a href='editUser.php?user_id=$row1->user_id'><span class='glyphicon glyphicon-edit'></span></a></td>";
               echo "<td> <a href='delUser.php?user_id=$row1->user_id'><span class='glyphicon glyphicon-trash'></span></a></td>";
              echo "</tr>";
            }
                 ?>
      </table>
   </div>

             <?php
             }
             }   

             ?>
    <br>

   <div class="table-responsive">
      <table class="table table-borderd">
         <tr class="btn-info">
            <th>Interviewer Name </th>
            <th> Email </th>
            <th> Panel Name</th>
            <th>Edit</th>
            <th>Delete</th>
         </tr>
         <?php
            while($row = mysqli_fetch_object($result))
            {
            	echo "<tr>";
            	echo "<td> $row->user_name </td>";
            	echo "<td> $row->email </td>";
            
				echo "<td> $row->panel_name</td>";
            
            
            	
            	 echo "<td><a href='editUser.php?user_id=$row->user_id'><span class='glyphicon glyphicon-edit'></span></a></td>";
            	 echo "<td> <a href='delUser.php?user_id=$row->user_id'><span class='glyphicon glyphicon-trash'></span></a></td>";
            	echo "</tr>";
            }
                 ?>
      </table>
   </div>
   <center>
      <ul class="pagination text-center" >
         <li><a href="?pageno=1">First</a></li>
         <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
         </li>
         <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
         </li>
         <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
      </ul>
   </center>
</div>
<?php } 
   else {
   	echo "admin features are restricted ";
   } ?>
<script src="/JS/interviewer.js"></script>
<?php
   include ("footer.php");
   ?>