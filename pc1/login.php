<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<style>
			.img{background-image: url('thumb-1920-351773.jpg');}
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<style>
		 i{color:red;}
		</style>

	</head>
	<body  class="img">
		<br>
		<div class="container">
			<div class="row ">
				<div class="col-sm-4"></div>
				<div class="col-sm-4" style="padding:20px;border:1px solid grey;">
					<h3 class="text-center">Login</h3>
					<hr>
					<form action="usercheck.php" method="post" id="form4">
					
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" id="email" >
							<i id="emailerror"></i>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" id="password">
							<i id="passworderror"></i>
						</div>
						
						<div class="form-group text-center">
							<button class="btn btn-primary btn-md" type="submit">Login</button>
							<hr>

							<a href="emailcheck.php">Forgot Password?</a>
						</div>
						
					</form>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         <script src="login.js"></script>

	</body>

</html>