<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="col-sm-8">
	  <h3 class="text-center">Upcoming Interview List</h3>
	 <!-- <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#status"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update Status</button> -->

		 <!-- Modal -->
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
							<input type="number" id="level" name="level" class="form-control">
							<i id="levelerror"></i>
						</div>
						
						<div class="form-group">
							<label>Type of Interview</label>&nbsp&nbsp
							<input type="checkbox" name="toi" id="tele" value="telephonic">Telephonic&nbsp&nbsp
							<input type="checkbox" name="toi" id="ftf"  value="FTF">FTF
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
						<div class="form-group">
						<label>Job title</label>
							  <!-- <input type="text" name="name" id="sname" list="mylist" placeholder="e.g. manasa" class="form-control"> -->
                               <!-- <datalist id="mylist"></datalist> -->

								 <select class="form-control" id="jobt" name="job">
									<option value="">--Choose Job title--</option>
									<?php

										$sql1="select * from schedule_interview";
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