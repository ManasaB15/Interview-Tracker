<?php
	include("admin_page.php");
	include("dbconfig.php");
?>
<div class="col-sm-8">
	<form action="updateUser.php" method="POST" id="form2">
		<h3 class="text-center">Edit Interviewer</h3>
							
		
		<?php
			$id=$_GET['user_id'];
			// print_r($id); exit;

			$sql="select * from user where user_id='$id'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_object($res);
		?>
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id ?>"> <br>
		   <label>Interviewer Name</label>
			<input type="text" name="name" id="fname" class="form-control" value="<?php echo $row->user_name ?>" required>
		</div>

		
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email ?>" required>
		</div>
		
		<div class="form-group">
			<label>Panel Name</label>
			<!-- <input type="text" name="panel" id="panel" class="form-control"> -->
				 <select class="form-control" id="panel" name="panel" value="<?php echo $row->panel_id?>" required>
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
 </script>

<?php
include ("footer.php");
?>
