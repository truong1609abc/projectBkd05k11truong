<?php 
	$title="cap nhat san pham" ;
	require_once ("layout/header.php");
 
if(isset($_GET['id'])){
	$id= $_GET['id'];
}
else{
	header("Location:index.php?module=product&action=list");
}
$sql = "DELETE FROM products WHERE id = '$id'";

$result = mysqli_query($conn,$sql);

if($result == false){
	echo "Error ".mysqli_error($conn);
}
else{
	
	if(mysqli_affected_rows($conn) > 0){
		mysqli_close($conn);
		header("Location:index.php?module=product&action=list");
	}
	else{
		echo "Lỗi: không có bản ghi có id = $id";
	}
}
require_once ("layout/footer.php");
 ?>