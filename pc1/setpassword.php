
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
		<div class="container">
			<div class="row ">
				<div class="col-sm-4"></div>
				<div class="col-sm-4" style="padding:20px;border:1px solid grey;">
					<h3 class="text-center">Set Password</h3>
					<hr>
					<form action="savepassword.php" method="POST" id="form4">
					
						
						
						<div class="form-group">
							<input type="hidden" name="hash" value="<?php echo $hash?>">
							<hr>
							<label>Password</label>
							<input type="password" name="password" class="form-control" id="password">
							<label>Confirm Password</label>
							<input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
							<i id="message"><i>
						</div>
						
						<div class="form-group text-center">
							<button class="btn btn-primary btn-md" type="submit">Reset</button>
							<hr>

							
						</div>
						
					</form>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
<script>

$('#password, #confirmPassword').on('keyup', function () {
  if ($('#password').val() == $('#confirmPassword').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>