<?php
     session_start();
	include("admin_page.php");
    include("dbconfig.php");
    $date= date("y/m/d h:m:s");
    // echo $date; exit;
    $level=$_POST['level'];

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

	$sql = "select * from schedule_interview where date_time >= '".$date."' LIMIT $offset, $no_of_records_per_page";
	


	// $query = "select * from update_status where level= '".$level."'"; 
	// $save = mysqli_query($conn,$query);
	// $rows=mysqli_fetch_object($save);


	$result = mysqli_query($conn,$sql);
	
?>
<?php if($_SESSION['role'] == '2') { ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="col-sm-8">
	<h3 class="text-center">Upcoming Interview List</h3>
	
		 <!-- Modal -->
		 		 <br><br>
  
		    <table class="table table-borderd table-hover">
				<tr class="btn-info">
					<th> Date-Time</th>
					<th> Job Title</th>
					<th>Type Of Interview</th>
					<th>Candidate Name </th>
					<th>Panel Name</th>
					<!-- <th>Update status</th> -->
					<th>View Status</th>
				</tr>
				<?php
				while($row=mysqli_fetch_object($result))
				{
				
					echo "<tr>";
					// echo "<td> $row->email </td>";
					echo "<td> $row->date_time</td>";
					echo "<td> $row->job_title</td>";
					echo "<td> $row->type_of_interview</td>";

			     $sql3="select * from candidate where candidate_id = $row->candidate_id";
				 $result1=mysqli_query($conn, $sql3);
				while($row1=mysqli_fetch_object($result1))
				{
				echo "<td> $row1->candidate_name</td>";	
				 // break;
				 }
						
			     $sql4="select * from panel where panel_id=$row->panel_id";
				 $result2=mysqli_query($conn, $sql4);
				 // echo '<pre>';print_r($row3);exit;
				 while($row2=mysqli_fetch_object($result2))
				 {
				  // echo '<pre>'; print_r($row4); exit;
				echo "<td> $row2->panel_name</td>";
				 // break;
				 }

					// // // echo "<td> $row->resume</td>";
				  
     //                   $status_id=$_SESSION['lastid'];
				 	echo "<td> <a href='updatestatusview.php?schedule_id=$row->schedule_id'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
				 	   $sched=$row->schedule_id;



				      // echo "<td> <a href='updatestatusview.php?status_id=$status_id'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
				    
					
					 echo "</tr>";

				}

				?>
				
			</table>
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
<?php } else { ?>
	<div class="form-group">
   <label>Permission Denied</label>
   </div>
<?php }?>



<?php
include ("footer.php");
?>