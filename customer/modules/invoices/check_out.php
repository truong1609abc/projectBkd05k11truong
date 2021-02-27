<?php 
if(!isset($_SESSION['customer'])) {
	header("Location:index.php?module=common&action=login");
}

if (isset($_POST['btnConfirm'])) {
	$receiver=$_POST['receiver'];
	$phone_no=$_POST['phone_no'];
	$address=$_POST['address'];
	if (isset($_SESSION['total_amount'])) $total_amount=$_SESSION['total_amount'];
	$id_customer=$_SESSION['customer']['id_customer'];
	$sql="INSERT INTO invoices VALUES (NULL,current_timestamp(),'$total_amount','$receiver',0,'$phone_no','$address',NULL,'$id_customer')";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		echo "Error: ".mysqli_error($conn);
	}
	else{
		$id_invoice=mysqli_insert_id($conn);
		foreach($_SESSION['giohang'] as $id_product => $quantity){
			$sql="INSERT INTO invoice_details VALUES ('$id_invoice','$id_product','$quantity') ";
			$result=mysqli_query($conn,$sql);
			if ($result==false) {
				die ("Error: ".mysqli_query($conn));
			}
		}
		unset($_SESSION['giohang']);
		header("Location:index.php?module=invoices&action=details&id_invoice=$id_invoice");
		die();
	}
}
?>






<?php 
$title = "Thanh toán";
require_once("layout/header.php") ?>
<style type="text/css">
	.check_out form{
		width: 60%;
		margin: auto;
		background-color: #EEE;
		font-size: large;
		padding: 16px;
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
		.sub-menu{
			z-index: 9999;
			display: none;
			position: absolute;
		}
		#main-menu1 li:hover .sub-menu{
			display: block;

		}
</style>
<script type="text/javascript">
	function OrderConfirm(){
		return confirm ("Bạn có xác nhận thanh toán!");
	}
</script>
<div class="check_out">
	<?php 
		$id_customer=$_SESSION['customer']['id_customer'];
		$sql="SELECT name,phone_no,address FROM customer WHERE id_customer='$id_customer'";
		$result=mysqli_query($conn,$sql);
		if ($result==false) {
			echo "Error: ".mysqli_error($conn);
		}
		else if (mysqli_num_rows($result)==1) {
			$row=mysqli_fetch_assoc($result);
			$name=$row['name'];
			$phone_no=$row['phone_no'];
			$address=$row['address'];
		}
	?>
	<form method="POST">
		<input type="text" name="receiver" value="<?php echo $name; ?>" placeholder="Người nhận" required><br>
		<input type="tel" name="phone_no" value="<?php echo $phone_no; ?>" placeholder="Số điện thoại" required><br>
		<input type="text" name="address" value="<?php echo $address; ?>" placeholder="Địa chỉ" required><br>
		<p>Thanh toán COD</p>
		<p>Giao hàng tiết kiệm</p>
		<p>Tống tiền: 
			<?php 
				if (isset($_SESSION['total_amount'])) {
					echo $_SESSION['total_amount']."VNĐ";
				}

			 ?>




		</p>
		<button type="submit" name="btnConfirm" onclick='return OrderConfirm()'>Xác nhận</button>
	</form>
	



</div>




<?php require_once("layout/footer.php") ?>