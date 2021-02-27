<?php 
if (isset($_GET['id_invoice'])) {
	$id_invoice=$_GET['id_invoice'];
	$sql="UPDATE invoices SET status = 2 WHERE id='$id_invoice'";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Error: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=invoices&action=list");
		die();
	}
}
else{
	header("Location:index.php");
}



 ?>