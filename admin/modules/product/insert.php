<?php 
	if (isset($_POST['btn'])) {
		$name =$_POST['name'];
		$price=$_POST['price'];
		$status=$_POST['status'];
		$mota=$_POST['mota'];
		$id_type=$_POST['type'];


		if ($_FILES['url']['size']>0) {
			$folder="../public/images/";
			$img=$_FILES['url']['name'];
			$url=$folder.$img;

			move_uploaded_file($_FILES['url']['tmp_name'],$url);
		}
		$sql="INSERT INTO products VALUES (NULL,'$name','$price','$mota','$status','$url','$id_type')";
		$result=mysqli_query($conn,$sql);

		if ($result==false) {
			echo "ERROR".mysqli_error($conn);
		}else{
			header("Location:index.php?module=product&action=list");
		}

	}
	
 ?>
<?php 
	$title="Thêm SảN Phẩm" ;
	require_once ("layout/header.php");
 ?>
  	<style type="text/css">
  		.insert{
  			margin-top: 10px;
  			background-color: #EEE;
  			width: 140%;
  			height: 100vh;
  		}
  		label{
  			margin-top: 10px;
  		}
  		.insert input{
  			width: 200px;
  			height: 30px;
  			border-radius: 2px;
  		}
  		.insert select,option{
  			width: 150px;
  			height: 30px;
  			border-radius: 2px;
  		}
  		.insert button{
  			width: 120px;
  			height: 40px;
  			border-radius: 5px;
  			line-height: normal;
  		}

  	</style>
  	<script type="text/javascript">
  		function changephoto(){
			let viewfood = document.getElementById('view');
			let viewfile = document.getElementById('file_img');
			let url = URL.createObjectURL(viewfile.files[0]);
			viewfood.src = url;
		}
  	</script>
  	<script type="text/javascript" src="../asset/ckeditor/ckeditor.js"></script>
 	<div class="insert">
 		<h1>Thêm sản phẩm</h1>
 		<form method="POST" enctype="multipart/form-data" style="margin-top: 30px;" >
 		<label style="margin-left: 100px;">
 			<b>Name-Food</b>
 			<input type="text" name="name" placeholder="Tên món ăn:" required="">
 		</label>
 		<label style="margin-left: 100px;">
 			<b >Price</b>
 			<input type="float" name="price" placeholder="Giá món ăn" required="">
 		</label>
 		<label style="margin-left: 80px;">
 			<b>Status</b>
 			<select name="status">
 				<option value="1">Còn hàng</option>
 				<option value="0">Hết hàng</option>
 				<option value="2">Hàng sắp Hết</option>
 				<option value="-1">Không kinh doanh</option>
 			</select>
 		</label>
 		<br>
 		<br>
 		<br>
 		<label style="margin-left: 100px;">
 			<b>Type</b>
 			<select name="type">
 				<?php 
 					$sql="SELECT id_type,name FROM types";
 					$result=mysqli_query($conn,$sql);
 					if ($result==false) {
 					 	echo "ERROR".mysqli_error($conn);
 					 } 
 					 else if(mysqli_num_rows($result)>0){
 					 	foreach ($result as $row) {
 					 		$id_type=$row['id_type'];
 					 		echo "<option value='$id_type'>".$row['name']."</option>";
 					 	}
 					 }
 				 ?>
 			</select>
 		</label >
 		<label  style="margin-left: 200px;">
 			<b>Image</b>
					<input onchange="changephoto()" type="file" name="url"  accept="*/images" id="file_img">
					<br>
					<img src="../public/images/avatar.png" width="200px" id="view" style="margin-left: 450px;">
 		</label>
 		<br>
 		<label style="margin-left: 250px;">
 			<b>Mô Tả:</b>
 			<br>
 			<textarea name="mota" cols="50" rows="6" style="margin-left: 300px;" id="thongtin"></textarea>
 			<script type="text/javascript">
 				 CKEDITOR.replace( 'thongtin' );
 			</script>
 		</label>
 		<br>
 		<button type="reset" style="margin-left:100px;">Reset</button>
 		<button type="submit" name="btn" style="margin-left: 500px;">Lưu Thông tin</button>
 		</form>
 	</div>
 <?php 
	require_once ("layout/footer.php");
 ?>