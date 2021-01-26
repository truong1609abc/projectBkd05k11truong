<?php 
if (isset($_GET['id_type'])) {
	$id_type=$_GET['id_type'];
	$sql="DELETE FROM types WHERE id_type='$id_type'";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Error: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=types&action=list");
	}
}




 ?>