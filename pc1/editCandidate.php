<?php

	include("admin_page.php");
	include("dbconfig.php");
?>
<div class="col-sm-8">
	<form action="updateCandidate.php" method="post" id="form2">
		<h3 class="text-center">Edit Candidate</h3>
							
		
		<?php
			$id=$_GET['candidate_id'];

			$sql="select * from candidate where candidate_id='$id'";
			// print_r($sql); exit;
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_object($res);
		?>
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id ?>">
		   <label>Candidate Name</label>
		   <input type="text" name="cname" id="cname" class="form-control" value="<?php echo $row->candidate_name; ?>" required>
		</div>

		<div class="form-group">
		    <label>Email</label>
			<input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email; ?>" required>
		</div>
						
		<div class="form-group">
			<label>Mobile No</label>
			<input type="number" name="mobile" id="mobile" class="form-control" value="<?php echo $row->mobile_no; ?>" required>
		</div>

		<div class="form-group">
			
			<label>PAN Card No</label>
			<input type="text" name="pan" id="pan" class="form-control" value="<?php echo $row->pan_no; ?>" required>
		</div>

		<div class="form-group">
			
			<label>Total Experience</label>
			<input type="number" min="0" max="10" class="form-control" id="te" name="te" value="<?php echo $row->total_experience; ?>" required>
	    </div>

		<div class="form-group">
			
			<label>Designation</label>
			<input type="text" name="desig" id="desig" class="form-control" value="<?php echo $row->designation; ?>" required>
		</div>

		<div class="form-group">
			
			<label>Resume</label>
			<input type="file" name="resume" id="resume" class="form-control" value="<?php echo $row->resume; ?>" required>
		</div>




		<div class="form-group text-center">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
		
	</form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<?php
include ("footer.php");
?>
