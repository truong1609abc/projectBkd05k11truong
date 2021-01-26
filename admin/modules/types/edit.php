<?php 
$name="";
if (isset($_GET['id_type'])) {
	$id_type=$_GET['id_type'];
	$sql="SELECT * FROM types WHERE id_type='$id_type'";
	$result = mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Error: ".mysqli_error($conn);
	}
	else if (mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_assoc($result);
		$name=$row['name'];
	}
}
if (isset($_POST['btn'])) {
	$name=$_POST['name'];
	$sql="UPDATE types SET name='$name' WHERE id_type='$id_type'";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Error ".mysqli_error($conn);
	}
	else{
		header("Location:index.php?module=types&action=list");
	}
}




 ?>



<?php 
$title = "Them hãng";
require_once("layout/header.php") ?>
<style type="text/css">
	.edit-types{
		padding: 16px;
		font-size: larger;
	}
	.edit-types form{
		margin: auto;
		padding: 16px;
		background-color: #CCC;
	}
</style>
<div class="edit-types">
	<form method="POST">
		<label>
			Name <br>
			<input type="text" name="name" placeholder="Tên loại" value="<?php echo $name; ?>">
		</label>
		<button type="submit" name="btn">Cập nhật thông tin</button>
	</form>


</div>







<?php require_once("layout/footer.php") ?>