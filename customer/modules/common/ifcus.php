<?php 
		$id=$name=$email=$phone_no=$address="";
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
			$email=$row['email'];
			$phone_no=$row['phone_no'];
			$address=$row['address'];


		}
		else{
			header("Location:index.php?module=common&action=home");
	}
}
	
	if (isset($_POST['btn'])) {
		$id=$_SESSION['customer']['id_customer'];
		$name =$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];

		$sql="UPDATE customer SET name='$name',email='$email',phone_no='$phone',address='$address' WHERE id_customer='$id' ";
		$result=mysqli_query($conn,$sql);

		if ($result==false) {
			echo "ERROR".mysqli_error($conn);
		}else{
			header("Location:index.php?module=common&action=home");
		}

	}
?>

<?php 
$title = "Thông Tin Khách Hàng";
require_once("layout/header.php") ?>
	<style>
		#tale1 tr,th,td{
 				border-collapse: collapse;
 				border:1px solid white ;
 				text-align: center;
 				color: white;
 				width: 200px;
 				height: 7vh;

		}
		#table1{
			margin: auto;
			border-radius: 5px;
		}
		input{
			width: 400px;
			color: black;
			height: 7vh;
		}
		#main-menu1 ul{
            list-style-type: none;
        }
        #main-menu1 li{
            display: inline-block;
            width: 250px;
            height: 10vh;
            line-height: 10vh;
            border: 2px solid white;
            border-radius: 20px;
            outline: none;
            font-size: 20px;
            font-family: 'Courier';
            margin-left: 20px;

        }
        #main-menu1 a{
            display: block;
            text-align: center;
            text-decoration: none;
            -webkit-transition-duration: 0.4s; 
            transition-duration: 0.4s;
            color: #EEEEEE;
        }
        #main-menu1 a:hover{
            color:black;
            background-color: white;
            border-radius: 17px;
        }
        #main-menu1 a:active{
            color:#66FF33;
            background-color: white;
            border-radius: 17px;
        }
        #main-menu1 li{
            position: relative;
        }
	</style>
	<script type="text/javascript">
	function OrderConfirm(){
		return confirm ("Bạn có xác nhận muốn đổi thông tin người dùng và quay về trang chủ!");
	}
</script>
	<div class="insert">
 		<h1 style="color:white;margin-bottom: 50px;text-align: center;">Thông Tin Khách Hàng</h1>
 		<form method="POST" enctype="multipart/form-data">
 		<table id="table1">
 			<tr>
 				<th>Tên User</th>
 				<th><input type="text" name="name" placeholder="Tên User:" required="" value="<?php echo $name ;?>"></th>
 			</tr>
 			<tr style="margin-top:20px; : ">
 				<th>Email Sử Dụng</th>
 				<th><input type="text" name="email" placeholder="Tên User:" required="" value="<?php echo $email ;?>"></th>
 			</tr>
 			<tr>
 				<th>Số Điện Thoại</th>
 				<th><input type="text" name="phone" placeholder="Tên User:" required="" value="<?php echo $phone_no ;?>"></th>
 			</tr>
 			<tr>
 				<th>Địa Chỉ</th>
 				<th><input type="text" name="address" placeholder="Tên User:" required="" value="<?php echo $address ;?>"></th>
 			</tr>
 		</table>
 		<button type="submit" name="btn" style="margin-left:45%;margin-top:10px;font-size: 20px;  ;" onclick='return OrderConfirm()'>Lưu Thông tin</button>
 	</form>
 </div>

<?php require_once("layout/footer.php") ?>