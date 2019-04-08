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

        $total_pages_sql = "SELECT COUNT(*) FROM panel";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

	$sql = "select * from panel order by panel_id desc LIMIT $offset, $no_of_records_per_page";
	$res = mysqli_query($conn, $sql);

	?>
	<?php if($_SESSION['role'] == '1') { ?> 
<div class="col-sm-8">
	<h3 class="text-center">Panel List</h3>
	 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#panel"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Panel</button>

		 <!-- Modal -->
		 <div class="modal fade" id="panel" role="dialog">
		    <div class="modal-dialog modal-sm">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"> Add Panel</h4>
		        </div>
		        <div class="modal-body bg-info">
		         
		        	<form action="panelsave.php" method="post" id="form2">
						<div class="form-group">
							<label>Panel Name</label>
							<input type="text" name="pname" id="pname" class="form-control">
							<i id="pnameerror"></i>
						</div>

						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Add</button>
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
				
				<th> Panel Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
				while($row = mysqli_fetch_object($res))
				{
					echo "<tr>";
					
					echo "<td> $row->panel_name </td>";
					echo "<td><a href='editPanel.php?panel_id=$row->panel_id'><span class='glyphicon glyphicon-edit'></span></a></td>";
					  echo "<td> <a href='delPanel.php?panel_id=$row->panel_id'><span class='glyphicon glyphicon-trash'></span></a></td>";
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

<style>
	i{color:red;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
			//==================================//
				$(".btn-primary").click(function(e){
					e.preventDefault();
						var pname=$("#pname").val();
					
				
						var status=true;
					
					
					//--------------------for name------------------//
					if(pname=="") {
						$("#pname").css('border-color','red');
						$("#pnameerror").text('Invalid Panel Name').css('color','red');
						status=false;
					}/*else if(!validateName(pname)){
						$("#pname").css('border-color','red');
						$("#pnameerror").text('Invalid Panel Name').css('color','red');
						status=false;
					}*/

					else {
						$("#pname").css('border-color','');
						$("#pnameerror").text('');
					}
					

					//--------------------------------------------------//

					/*function validateName(pname){
						var namePattern=/^[A-Z\s]{1,}[A-Za-z\s]{0-}$/;
						var namePattern.test(pname);
					}*/


					//---------------------------------------------------//
					if(status==true)
					{
						$("#form2").submit();
					}
					
				});//btnclick closes
			//==================================//
			});

	
</script>
<?php }
else {
	echo "permission not allowed";
} ?>

<?php
include ("footer.php");
?>
