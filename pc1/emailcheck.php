<?php 
    session_start();
	include('dbconfig.php');


	if(isset($_POST['submit'])) {

			$email=$_POST['email'];



			$sql="SELECT * FROM user WHERE email='".$email."'";

			$res=mysqli_query($conn,$sql);

			$row=mysqli_fetch_assoc($res);
 
			$demail=$row['email'];
			$hash=$row['hash'];
			 // print_r($hash); exit;



			


			if($email == $demail) {

	   			 $from=$_SESSION['email'];

	   			 $to="$email";

	   			 $subject="Reset your Password";

	   			 $header="From:".$from;

	   			 $message="http://interview.dev-fsit.com/forgot.php?hash=".$hash ;

				 $mail= mail($to, $subject, $message, $headers);

			}
			else {
				echo "please enter valid email";
			}
			if($mail==true){
				echo 'mail sent';
			}
			else {
				echo "mail not send";
			}


	} 

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
		<div class="container-fluid">
			<br>
		<form action="emailcheck.php" method="POST">
			<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4 bg-info">
						<h3 class="text-center">Enter the Email of your Account to reset the new password</h3>
						<hr>
						<div class="form-group">
							<label>Enter email</label>
							<input type="email" name="email" class="form-control">
						</div>

						<div class="form-group text-center">
								<button class="btn btn-primary btn-md" type="submit" name="submit">Continue</button>
						</div>

					</div>
					<div class="col-sm-4"></div>
			</div>
		</form>
	</div>
	


</body>
</html>
