<?php

	include("admin_page.php");
	include("dbconfig.php");
?>
<div class="col-sm-8">
	<form action="updatePanel.php" method="post" id="form2">
		<h3 class="text-center">Edit Panel</h3>
							
		
		<?php
			$id=$_GET['panel_id'];
			$sql="select * from panel where panel_id='$id'";
			$res=mysqli_query($conn,$sql);
			$row=mysqli_fetch_object($res);
		?>
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<label>Panel Name</label>
			<input type="text" name="pname" id="pname" class="form-control"value="<?php echo $row->panel_name; ?>" required>
			<i id="pnameerror"></i>
		</div>

		<div class="form-group text-center">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
		
	</form>
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

<?php
include ("footer.php");
?>
