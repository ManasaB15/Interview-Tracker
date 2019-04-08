<?php
	include("admin_page.php");
	include("dbconfig.php");
?>
	
		<div class="col-sm-8">
			<caption class="text-center"> Panel List</caption>
					<?php
						$id = $_GET['panel_id'];
						
						$sql="select * from panel where panel_id=$id";
						$res=mysqli_query($conn,$sql);
						$row=mysqli_fetch_assoc($res);

					?>
					<table class="table table-bordered table-hover">
					
						<tr class="active">
							<th>Panel Name</th>
							<td><?php echo $row['panel_name']; ?></td>
						</tr>
						
					</table>
		</div>
	
	
<?php
	include("footer.php");
?>