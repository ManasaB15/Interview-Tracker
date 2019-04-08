<?php
    session_start();
  	include("dbconfig.php");
  	
	// echo "<pre>"; print_r($row123); die;

?>  

  


<!DOCTYPE html>
<html>
<head>
	<title>Update Status View</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
    	<div class="row">
    		
    		<div class="col-sm-6">
    			 <?php 
					    $id1=$_GET['schedule_id'];
					  	// echo $id1; exit;

					  	$query="select candidate_id from schedule_interview where schedule_id=".$id1;

						$result=mysqli_query($conn, $query);
						$row=mysqli_fetch_object($result);
					  	$candidate_id111 = $row->candidate_id;
					  	// echo $candidate_id111; exit;
					  	

					  	$query123="select * from candidate where candidate_id='$candidate_id111'";
					  	//echo $query123; die;
					  	$result123=mysqli_query($conn, $query123);
						$row123=mysqli_fetch_array($result123);
						// echo $row->'candidate_name'; exit;
                     ?>
    			<table class="table table-bordered table-hover">
					<caption class="text-center"> Candidate details</caption>
					<tr class="info">
						<th>candidate_name</th>
						<td><?php echo $row123['candidate_name']; ?></td>

					 
					</tr>
					<tr class="warning">
						<th>email</th>
						<td><?php echo $row123['email']; ?></td>
					</tr>
					<tr class="success">
						<th>mobile_no</th>
						<td><?php echo $row123['mobile_no']; ?></td>
					</tr>
					<tr class="danger">
						<th>pan_no</th>
						<td><?php echo $row123['pan_no']; ?></td>
					</tr>
					<tr class="info">
						<th>total_experience</th>
						<td><?php echo $row123['total_experience']; ?></td>
					</tr>
					<tr class="info">
						<th>resume</th>
						<td><?php echo $row123['resume'];?>


						<a href="/Upload/<?php echo $row123['resume'];?>" download>
							<button>Download</button>
						</a></td>
					</tr>

					
				</table>
    			
    		</div>
			<div class="col-sm-6">
				<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#status'><span class='glyphicon glyphicon-edit'></span>&nbsp;Update Status</button>
				 <h3 class="text-center"> Update status List</h3>
				
				<?php
				  // $id=$_SESSION['lastid'];
				    // print_r($id); exit;

					
					$sql="select * from update_status where schedule_id=".$id1;

					$res=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($res)) {
					// print_r($row); exit;


				?>
				
                

				<table class="table table-bordered table-hover">
					<tr class="info">
						<th>Level</th>
						<th>Type of Interview</th>
						<th>Status</th>
						<th>Comments</th>
						<th>Rating</th>
					</tr>
					<tr class="warning">
					    <td><?php echo $row['level']; ?></td>
					    <td><?php echo $row['type_of_interview']; ?></td>
					    <td><?php echo $row['status']; ?></td>
					    <td><?php echo $row['comments']; ?></td>
					    <td><?php echo $row['rating']; ?></td>


						
					</tr>
					

					
				</table>
			<?php } 
                  ?>
	
			</div>
		<div>
 
</div>


<div class="modal fade" id="status" role="dialog">
		    <div class="modal-dialog modal-sm">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"> Update Status</h4>
		        </div>
		        <div class="modal-body bg-info">
		         	<form action="updatesave.php" method="post" id="form3">
						<h3 class="text-center">Update Interview Status</h3>
						<div class="form-group">
							<label>Level</label>
							<input type="number" id="level" name="level" min="1" max="10"class="form-control">
							<i id="levelerror"></i>
						</div>
						
						<div class="form-group">
							<label>Type of Interview</label>&nbsp&nbsp
							<select class="form-control" id="toi" name="toi">
								<option value="">--Choose Type of interview</option>
								<option value="Telephonic">Telephonic</option>
								<option value="FTF">FTF</option>
								<option value="Skype">Skype</option>
								<option value="Machine Test">Machine Test</option>
							</select>
							<i id="toierror"></i>
						</div>
						
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" id="istatus" name="status">
								<option value="0">--Choose Status--</option>
								<option value="Selected">Selected</option>
								<option value="Rejected">Rejected</option>
								<option value="Hold">Hold</option>
								
							</select>
							<i id="istatuserror"></i>
							
						</div>
						<div class="form-group" >
						<label>Job title</label>
							  <!-- <input type="text" name="name" id="sname" list="mylist" placeholder="e.g. manasa" class="form-control"> -->
                               <!-- <datalist id="mylist"></datalist> -->

								 <select class="form-control" id="jobt" name="job" >
									<option value="">--Choose Job title--</option>
									<?php

										$sql1="select * from schedule_interview where schedule_id=".$id1;
										$res=mysqli_query($conn,$sql1);
										 while($jobt=mysqli_fetch_assoc($res))
										{
										?>
										<option value = "<?php echo($jobt['schedule_id'])?>" >
		                                    <?php echo($jobt['job_title']) ?>
		                                </option>
		                                <?php
										}
									?>
								</select>
							<i id="snameerror"></i>
						</div>

						<div class="form-group">
							<label>Comments</label>
							<textarea id="comment" name="comment"class="form-control"></textarea>
							<i id="commenterror"></i>
						</div>

						<div class="form-group">
							<label>Rating</label>
							<input type="number" id="rating" name="rating" min="0" max="5" class="form-control">
							<i id="ratingerror"></i>
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Update</button>
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
		  
</body>
</html>
<style>
	i{color:red;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<script>
	$(document).ready(function(){
			//==================================//
				$(".btn-primary").click(function(e){
					e.preventDefault();
						var level=$("#level").val();
						var Type = $("#toi option:selected").val();
					    var status = $("#istatus option:selected").val();

						var comment=$("#comment").val();
						var rating=$("#rating").val();
				
						var status=true;
					
					
					//--------------------for name------------------//
					if(level=="") {
						$("#level").css('border-color','red');
						$("#levelerror").text('Please enter level Name').css('color','red');
						status=false;
					}

					else {
						$("#level").css('border-color','');
						$("#levelerror").text('');
					}

					//-------------------------TOI-------------------------//
					
					if(Type=="") {
						$("#toi").css('border-color', 'red');
						$("#toierror").text("Please Select panel").css('color','red');
						status=false;
					}else {
						$("#toi").css('border-color', '');
						$("#toierror").text("").css('color', '');
					}
					//-----------------------status-------------------------------//

					if(status=="") {
						$("#istatus").css('border-color', 'red');
						$("#istatuserror").text("Please Select status").css('color','red');
						status=false;
					}else {
						$("#istatus").css('border-color', '');
						$("#istatuserror").text("").css('color', '');
					}


					//--------------------------comment------------------------//

					if(comment=="") {
						$("#comment").css('border-color','red');
						$("#commenterror").text('Please enter Comment').css('color','red');
						status=false;
					}

					else {
						$("#comment").css('border-color','');
						$("#commenterror").text('');
					}

					//--------------------------rating------------------------//

					if(rating=="") {
						$("#rating").css('border-color','red');
						$("#ratingerror").text('Please enter Rating').css('color','red');
						status=false;
					}

					else {
						$("#rating").css('border-color','');
						$("#ratingerror").text('');
					}
					

					

					//---------------------------------------------------//
					if(status==true)
					{
						$("#form3").submit();
					}
					
				});//btnclick closes
			//==================================//
			});


</script>

	
<!-- 	
 <?php
	include("footer.php");
?>  -->
