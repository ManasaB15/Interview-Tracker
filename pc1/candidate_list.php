<?php
	include("admin_page.php");
	include("dbconfig.php");

	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM candidate";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


	$sql = "select * from candidate order by candidate_name LIMIT $offset, $no_of_records_per_page";
	$res = mysqli_query($conn,$sql);

?>
<?php if($_SESSION['role']=='1'){ ?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	

		<style>
			i{color:red;}

		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  	
<div class="col-sm-12">
	<h3 class="text-center">Candidate List</h3>
	 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#candidate"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Candidate</button>


		 <!-- Modal -->
		 <div class="modal fade" id="candidate" role="dialog">
		    <div class="modal-dialog modal-sm">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"> Add Candidate</h4>
		        </div>
		        <div class="modal-body bg-info">
		         
			        <form action="addCandidate.php" method="POST" enctype="multipart/form-data"  id="form1" >
						<div class="form-group">
							<label>Candidate Name</label>
							<input type="text" name="cname" id="cname" class="form-control">
							<i id="nameerror"></i>
						</div>
						
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" id="email" class="form-control">
							<i id="emailerror"></i>
						</div>
						
						<div class="form-group">
							<label>Mobile No</label>
							<input type="number" name="mobile" id="mobile" class="form-control">
							<i id="mobileerror"></i>
						</div>

						<div class="form-group">
							<label>PAN Card No</label>
							<input type="text" name="pan" id="pan" class="form-control">
							<i id="panerror"></i>
						</div>

						<div class="form-group">
							<label>Total Experience</label>
							<input type="number" min="0" max="10" class="form-control" id="te" name="te">
							<i id="teerror"></i>
						</div>

						<div class="form-group">
							<label>Designation</label>
							<input type="text" name="desig" id="desig" class="form-control">
							<i id="desigerror"></i>
						</div>

						<div class="form-group">
							<label>Resume</label>
							<input type="file" name="resume" id="resume" class="form-control" accept=".pdf" enctype="multipart/form-data">
							<i id="resumeerror"></i>
						</div>
						
						<div class="form-group text-center">
							<button type="submit"  class="btn btn-primary">Add</button>
							<button type="reset" class="btn btn-warning">Clear</button>
						</div>
					
					</form>

		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		 </div>
		 <br><br>
		 

		
  
			 <table class="table table-borderd table-hover">
				<tr class="btn-info">
					<th>Name </th>
					<th> Email </th>
					<th> Mobile</th>
					<th>PAN</th>
					<th> Experience</th>
					<th>Designation</th>
					<th>Resume</th>
					<th>Edit/Delete</th>
				</tr>	

				<?php
				while($row=mysqli_fetch_object($res))
				{
					echo "<tr>";
					echo "<td> $row->candidate_name </td>";
					echo "<td> $row->email </td>";
					echo "<td> $row->mobile_no</td>";
					echo "<td> $row->pan_no</td>";
					echo "<td> $row->total_experience</td>";
					echo "<td> $row->designation</td>";
					echo "<td> $row->resume</td>";
					echo "<td><a href='editCandidate.php?candidate_id=$row->candidate_id'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;&nbsp; &nbsp;<a href='delCandidate.php?candidate_id=$row->candidate_id'><span class='glyphicon glyphicon-trash'></span></a></td>";
					echo "</tr>";
				}
				?>
						
			</table>
			<center>
				<ul class="pagination text-center" >
	        		<li><a href="?pageno=1">First</a></li>
	        		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
	           		<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
	        		</li>
	        		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
	            	<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
	        		</li>
	        		<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
   				</ul>
   		</center>
 
		
</div>
<?php } 
else { ?>
	<div class="form-group">
   <label>Permission Denied</label>
   </div>
  <?php  } ?>



<?php
	include ("footer.php");
?>

<script src="val.js"></script>