<?php 
if (isset($_GET['id_invoice'])) {
	$id_invoice=$_GET['id_invoice'];
	$sql="UPDATE invoices SET status = -1 WHERE id='$id_invoice'";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Error: ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=invoices&action=list2");
		die();
	}
}
else{
	header("Location:index.php");
}



 ?>