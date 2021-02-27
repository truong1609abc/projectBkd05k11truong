<?php 
		$id=$name=$pass=$error="";
		 $id=$_SESSION['customer']['id_customer'];
		 $sql="SELECT * FROM customer WHERE id_customer='$id'";
		 $result = mysqli_query($conn,$sql);
	if($result == false){
		echo "Error: ".mysqli_error($conn);
		mysqli_close($conn);
	}
	else{
		if(mysqli_affected_rows($conn) > 0){
			$row = mysqli_fetch_assoc($result);
			$name = $row['name'];
		}
		else{
			header("Location:index.php?module=common&action=home");
	}
}
	/*
		Cap nhat mat khau
		- dk : mat khau cu nhap vao co dung hay ko?
		- new pass = re pass 
         ÔSql = update customer SET pass='$newpass' WHERE pass = '$oldpass' AND id='$user';

	 */
 	if (isset($_POST['btn'])) {
		$id=$_SESSION['customer']['id_customer'];
		$matkhaucu =MD5($_POST['matkhaucu']);
		$matkhaumoi1=MD5($_POST['matkhaumoi1']);
		$matkhaumoi2=MD5($_POST['matkhaumoi2']);
		$sql="UPDATE customer SET pass='$matkhaumoi1' WHERE pass='$matkhaucu' AND id_customer='$id'";
		$result=mysqli_query($conn,$sql);
		$count=mysqli_affected_rows($conn);
		if ($count==1) {
			header("location:index.php?module=common&action=home");
			}
		else{
			$error ="Mật khẩu cũ không đúng vui lòng nhập lại";
		}

	}
?>
<?php
$title = "Đổi Mật Khẩu";
require_once("layout/header.php") ?>
	<div class="insert">
		<?php 
			echo $error;
		 ?>
 		<h1 style="margin-bottom: 50px;">Đổi Mật Khẩu Người Dùng</h1>
 		<form method="POST" enctype="multipart/form-data">
 		<label style="margin-left: 100px;">
 			<b>Tên user</b>
 			<input type="text" name="name" placeholder="Tên món ăn:" required="" value="<?php echo $name ;?>">
 		</label>
 		<br>
 		<br>
 		<label style="margin-left: 100px;">
 			<b >Mật Khẩu cũ</b>
 			<input type="float" name="matkhaucu" placeholder="Hãy Nhập Mật Khẩu Hiện Tại" required="">">
 		</label>
 		<br>
 		<br>
 		<label style="margin-left: 100px;">
 			<b >Mật Khẩu Mới</b>
 			<input type="float" name="matkhaumoi1" placeholder="Hãy Nhập Mật Khẩu Bạn Muốn Đổi" required="">">
 		</label>
 		<br>
 		<br>
 		<label style="margin-left: 100px;">
 			<b > Nhập Lại Mật Khẩu Mới</b>
 			<input type="float" name="matkhaumoi2" placeholder="Hãy Nhập  Lại Mật Khẩu Hiện Tại" required="">">
 		</label>
 		<button type="submit" name="btn" style="margin-left:45%;margin-top:10px;font-size: 20px;  ;" onclick='return OrderConfirm()'>Lưu Thông tin</button>
 	</form>
 </div>


<?php require_once("layout/footer.php") ?>