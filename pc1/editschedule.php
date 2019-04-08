<?php

	include("admin_page.php");
	include("dbconfig.php");
?>
<div class="col-sm-8">
	<form action="updateschedule.php" method="post" id="form2">
		<h3 class="text-center"> ReSchedule Interview</h3>
							
		
		<?php
			$id=$_GET['schedule_id'];
			$sql="select * from schedule_interview where schedule_id='$id'";
			$res=mysqli_query($conn,$sql);
			// print_r($id); exit;
			$row=mysqli_fetch_object($res);
			// echo $row->type_of_interview; exit;
		?>
		<div class="form-group">
			                <input type="hidden" name="id" value="<?php echo $id ?>">

							<label>Candidate Name</label>

							  <!-- <input type="text" name="name" id="sname" list="mylist" placeholder="e.g. manasa" class="form-control"> -->
                               <!-- <datalist id="mylist"></datalist> -->

								 <select class="form-control" id="sname" name="name" value="<?php echo $row->candidate_id; ?>" required>
									<option value="">--Choose Candidate Name--</option>
									<?php
										$selected = "";
										$sql1="select * from candidate";
										$res=mysqli_query($conn,$sql1);
										 while($candidates=mysqli_fetch_assoc($res))
										{
											if($candidates['candidate_id'] == $row->candidate_id){
												$selected = "selected";
											}
											?>
											<option value = "<?php echo($candidates['candidate_id']);?>" <?php echo $selected ?>>
			                                    <?php echo($candidates['candidate_name']) ?>
			                                </option>
			                                <?php
											$selected = "";
										}
									?>
								</select>
						</div>
						<!-- 
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email; ?>">
							<i id="emailerror"></i>
						</div>
						 -->
						<div class="form-group">
							<label>Date-Time</label>
							<input type="datetime-local" name="date" id="dt" class="form-control" value="<?php echo $row->date_time; ?>" required>
						</div>

						<div class="form-group">
							<label>Job Title</label>
							<input type="text" name="job" id="jobt" class="form-control" value="<?php echo $row->job_title; ?>" required>
						</div>

						<div class="form-group">
							<label>Panel Name</label>
								 <select class="form-control" id="panel" name="panel" value="<?php echo $row->panel_id; ?>" required>
									<option value="">--Choose Panel--</option>
									<?php
										$selected = "";
										$sql1="select * from panel";
										$res=mysqli_query($conn,$sql1);
										 while($panel=mysqli_fetch_assoc($res))
										{
											if($panel['panel_id'] == $row->panel_id){
												$selected = "selected";
											}
											?>
											<option value = "<?php echo($panel['panel_id']);?>" <?php echo $selected ?>>
			                                    <?php echo($panel['panel_name']) ?>
			                                </option>
			                                <?php
											$selected = "";
										}
									?>
								</select>
						</div>
						<div class="form-group">
						   <label>Type of Interview</label>&nbsp;
							<select class="form-control" id="toi" name="toi"  required>
								<option value="">--Choose Type of interview</option>
								<option <?php if($row->type_of_interview=="Telephonic"){echo "selected";}?>>Telephonic</option>

								<option <?php if($row->type_of_interview=="FTF"){echo "selected";}?>>FTF</option>
								<option <?php if($row->type_of_interview=="Skype"){echo "selected";}?>>Skype</option>
								<option <?php if($row->type_of_interview=="Machine Test"){echo "selected";}?>>Machine Test</option>
							</select>
							</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
				<style>
	i{color:red;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
<!-- 	 </script>

<?php
include ("footer.php");
?>
