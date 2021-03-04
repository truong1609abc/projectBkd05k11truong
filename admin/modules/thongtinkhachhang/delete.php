<?php 
	$title="cap nhat san pham" ;
	require_once ("layout/header.php");
 
if(isset($_GET['id'])){
	$id= $_GET['id'];
}
else{
	header("Location:index.php?module=thongtinkhachhang&action=thongtinkhachhang");
}
$sql = "DELETE FROM customer WHERE id_customer = '$id'";

$result = mysqli_query($conn,$sql);

if($result == false){
	echo "Error ".mysqli_error($conn);
}
else{
	
	if(mysqli_affected_rows($conn) > 0){
		mysqli_close($conn);
		header("Location:index.php?module=thongtinkhachhang&action=thongtinkhachhang");
	}
	else{
		echo "Lỗi: không có bản ghi có id = $id";
	}
}
require_once ("layout/footer.php");
 ?>