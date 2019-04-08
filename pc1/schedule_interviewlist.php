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

        $total_pages_sql = "SELECT COUNT(*) FROM schedule_interview";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

	$sql = "select * from schedule_interview LIMIT $offset, $no_of_records_per_page"; 

	$result = mysqli_query($conn,$sql);
	

	?>
	<?php if($_SESSION['role'] == '1') { ?>
	<style>
	  i{color:red;}
   </style>
   
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="col-sm-8">
	<h3 class="text-center">Scheduled Interview List</h3>
	 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#schedule"><span class="glyphicon glyphicon-plus"></span>&nbsp;Schedule Interview</button>

		 <!-- Modal -->
		 <div class="modal fade" id="schedule" role="dialog">
		    <div class="modal-dialog modal-sm">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"> Schedule Interview</h4>
		        </div>
		        <div class="modal-body bg-info">
		         	<form action="schedulesave.php" method="post" id="form3">
						<div class="form-group">
							<label>Candidate Name</label>
							  <!-- <input type="text" name="name" id="sname" list="mylist" placeholder="e.g. manasa" class="form-control"> -->
                               <!-- <datalist id="mylist"></datalist> -->

								 <select class="form-control" id="sname" name="name">
									<option value="">--Choose Candidate Name--</option>
									<?php

										$sql1="select * from candidate";
										$res=mysqli_query($conn,$sql1);
										 while($candidates=mysqli_fetch_assoc($res))
										{
										?>
										<option value = "<?php echo($candidates['candidate_id'])?>" >
		                                    <?php echo($candidates['candidate_name']) ?>
		                                </option>
		                                <?php
										}
									?>
								</select>
							<i id="snameerror"></i>
						</div>
						
                       <!-- <div class="form-group">
							<label>Email</label>
							<input type="email" name="email" id="email" class="form-control">
							<i id="emailerror"></i>
						</div> -->
						
						<div class="form-group">
							<label>Date-Time</label>
							<input type="datetime-local" name="date" id="dt" class="form-control">
							<i id="dterror"></i>
						</div>

						<div class="form-group">
							<label>Job Title</label>
							<input type="text" name="job" id="jobt" class="form-control">
							<i id="jobterror"></i>
						</div>

						<div class="form-group">
							<label>Panel Name</label>
								 <select class="form-control" id="panel" name="panel">
									<option value="">--Choose Panel--</option>
									<?php

										$sql2="select * from panel";
										$res1=mysqli_query($conn,$sql2);
										while($panel=mysqli_fetch_assoc($res1))
										{
										?>
										<option value = "<?php echo($panel['panel_id'])?>" >
		                                    <?php echo($panel['panel_name']) ?>
		                                </option>
		                                <?php
										}
									?>
								</select>
							<i id="panelerror"></i>
						</div>

						<div class="form-group">
							<label>Type of Interview</label>&nbsp;
							<select class="form-control" id="toi" name="toi">
								<option value="">--Choose Type of interview</option>
								<option value="Telephonic">Telephonic</option>
								<option value="FTF">FTF</option>
								<option value="Skype">Skype</option>
								<option value="Machine Test">Machine Test</option>
							</select>
                            <i id="toierror"></i>
						</div>
							
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Add</button>
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
  
		 <table class="table table-borderd table-hover">
			<tr class="btn-info">
				<!-- <th> Email </th> -->
				<th> Date-Time</th>
				<th> Job Title</th>
				<th>Type Of Interview</th>
				<th>Candidate Name </th>

				<th>Panel Name</th>
				<th>Edit</th>
				<th>Delete</th>
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

					// // echo "<td> $row->resume</td>";
					   echo "<td><a href='editschedule.php?schedule_id=$row->schedule_id'><span class='glyphicon glyphicon-edit'></span></a></td>";
					 echo "<td> <a href='delschedule.php?schedule_id=$row->schedule_id'><span class='glyphicon glyphicon-trash'></span></a></td>";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script >
	$(document).ready(function(){
	$(".btn-primary").click(function(e){
		e.preventDefault();
		var name = $("#sname ").val();
		var datetime=$("#dt").val();
		var jobt=$("#jobt").val();
		var panel = $("#panel option:selected").val();
		var Type = $("#toi option:selected").val();
		

		var status=true;

// .....................................validation for candidate name...........................................//

		if(name=="") {
			$("#sname").css('border-color', 'red');
			$("#snameerror").text("Please Select candidate name").css('color','red');
			status=false;
		}else {
			$("#sname").css('border-color', '');
			$("#snameerror").text("").css('color', '');
		}

//.............................................validation for email..............................................//


		


//.....................................................date and time validation.................................//


		if(datetime=="") {
			$("#dt").css('border-color','red');
			$("#dterror").text('Invalid Date and Time').css('color','red');
			status=false;
		}
		else {
			$("#dt").css('border-color','');
			$("#dterror").text ('');

		}


//.........................................................job title validation.....................................//


		if(jobt=="") {
			$("#jobt").css('border-color','red');
			$("#jobterror").text('Invalid job title').css('color','red');
			status=false;
		}
		else {
			$("#jobt").css('border-color','');
			$("#jobterror").text('');
		}


//.........................................................panel validation.........................................//


		if(panel=="") {
			$("#panel").css('border-color', 'red');
			$("#panelerror").text("Please Select panel").css('color','red');
			status=false;
		}else {
			$("#panel").css('border-color', '');
			$("#panelerror").text("").css('color', '');
		}

//.........................................................Type interview validation...................................//


		if(Type=="") {
			$("#toi").css('border-color', 'red');
			$("#toierror").text("Please Select panel").css('color','red');
			status=false;
		}else {
			$("#toi").css('border-color', '');
			$("#toierror").text("").css('color', '');
		}

		if(status==true) {
			$("#form3").submit();
		}

     });
});
</script>

<?php } 
 else { 
 	echo "Permission Denied.";
  } ?>

<?php
include ("footer.php");
?>