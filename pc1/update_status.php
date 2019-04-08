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
			<form action="" method="post">
				<h3 class="text-center">Update Interview Status</h3>
				<div class="form-group">
					<label>Level</label>
					<select class="form-control">
						<option>--Choose--</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Type of Interview</label>&nbsp&nbsp
					<input type="checkbox" name="Tele" id="tele" value="Telephonic">Telephonic&nbsp&nbsp
					<input type="checkbox" name="FTF" id="ftf"  value="FTF">FTF
				</div>
				
				<div class="form-group">
					<label>Status</label>
					<select class="form-control">
						<option>--Choose--</option>
					</select>
					
				</div>

				<div class="form-group">
					<label>Comments</label>
					<textarea class="form-control" id="comment" name="Comment"></textarea>
				</div>

				<div class="form-group">
					<label>Rating</label>
					<select class="form-control">
						<option>--Choose--</option>
					</select>
				</div>

					
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="reset" class="btn btn-warning">Clear</button>
				</div>
				
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
	</body>
</html>