<?php
  include("dbconfig.php");
  $candidate=$_GET['name'];

  $sql="SELECT * FROM candidate WHERE candidate_name LIKE '$candidate%' ORDER BY candidate_name";


  $res=mysqli_query($conn,$sql);

  if(!$res) {
  	echo mysqli_error($conn);
  }
  else {
  	while($row=mysqli_fetch_object($res)) {
  		echo "<option value='".$row->candidate_id."'>".$row->candidate_name."</option>";
  	}
  }
  ?>