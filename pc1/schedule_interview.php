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
			<form action="shedulesave.php" method="post">
				<h3 class="text-center">Schedule Interview</h3>
				<div class="form-group">
					<label>Candidate Name</label>
					<input type="text" name="name" id="fname" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" id="email" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Date-Time</label>
					<input type="datetime-local" name="password" id="password" class="form-control">
				</div>

				<div class="form-group">
					<label>Job Title</label>
					<input type="text" name="cpassword" id="cpassword" class="form-control">
				</div>

				<div class="form-group">
					<label>Panel Name</label>
					<select class="form-control">
						<option>--Choose--</option>
					</select>
				</div>

				<div class="form-group">
					<label>Type of Interview</label>
					<input type="checkbox" name="toi" value="Telephonic">Telephonic
					<input type="checkbox" name="toi" value="FTF">FTF
					

				</div>
					
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary">Add</button>
					<button type="reset" class="btn btn-warning">Clear</button>
				</div>
				
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
	</body>
</html>