<?php 
if (isset($_POST['btn'])) {
	$name = $_POST['name'];
	$sql ="INSERT INTO types VALUES (NULL,'$name')";
	$result= mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Error:".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=types&action=list");
	}
}




 ?>



<?php 
$title = "Thêm loại";
require_once("layout/header.php") ?>
<style type="text/css">
	.insert-types{
		padding: 16px;
		font-size: larger;
	}
	.insert-types form{
		margin: auto;
		padding: 16px;
		background-color: #CCC;
	}
</style>
<div class="insert-types">
	<form method="POST">
		<label>
			Name <br>
			<input type="text" name="name" placeholder="Tên Loại"><br>
		</label>
		<button type="submit" name="btn">Lưu thông tin</button>
	</form>
</div>





<?php require_once("layout/footer.php") ?>