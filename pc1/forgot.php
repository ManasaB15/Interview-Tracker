<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<title></title>
	<?php
			include("dbconfig.php");
			$hash=$_GET['hash'];
			   // print_r($hash); exit;
			$sql="select * from user where hash='".$hash."'";

						
			$res= mysqli_query($conn,$res);
			// print_r($res); exit;

			$row= mysqli_fetch_object($res);
		    // print_r($row); exit;

		 ?>
	
</head>
<body>
	<div class="container-fluid">
		<br>
	<form action="forgotsave.php" method="POST">
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4 bg-info">
					<h3 class="text-center">Reset Password</h3>
					<hr>
					<div class="form-group">
						<input type="hidden" name="hash" value="<?php echo $hash?>">
							<hr>
						<label>Set Password</label>
						<input type="password" name="password" class="form-control" id="password">
						<label>Confirm Password</label>
						<input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
						<i id="message"><i>
	
					</div>

					<div class="form-group text-center">
							<button class="btn btn-primary btn-md" type="submit">Reset</button>
					</div>

				</div>
				<div class="col-sm-4"></div>
		</div>
	</form>
</div>

</body>
<script>

  $('#password, #confirmPassword').on('keyup', function () {
  if ($('#password').val() == $('#confirmPassword').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else {
    $('#message').html('Not Matching').css('color', 'red');
  }
  });
  
</script>

</html>