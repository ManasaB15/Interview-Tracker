<html>
	<head>
		<link rel="stylesheet" href="dist/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
		
	</head>
	<body>
	<div class="row">
		<br>
		<div class="col-sm-3"></div>
		<div class="col-sm-6 bg-info" style="padding:15px;">
			<form action="" method="post" name="myform" >
				<h3 class="text-center">Add Interviewer</h3>
				<div class="form-group">
					<label>Interviewer Name</label>
					<input type="text" name="name" id="fname" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" id="email" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Panel Name</label>
					<select class="form-control">
						<option>--Choose Panel--</option>
					</select>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="cpassword" id="cpassword" class="form-control">
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary" onclick = "return(validate());" >Add</button>
					<button type="reset" class="btn btn-warning">Clear</button>
				</div>
				
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
	</body>
</html>