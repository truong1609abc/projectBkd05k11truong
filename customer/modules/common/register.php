<?php 
$name = $email = $phone_no = $address = $pass = $error = "";
if(isset($_POST['btn'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone_no'];
	$address = $_POST['address'];
	$pass = md5($_POST['pass']);
	
	$sql = "INSERT INTO customer VALUES (NULL,'$name','$email','$phone_no','$address','$pass')";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		$error = mysqli_error($conn);
	}
	else{

		header("Location:index.php?module=common&action=login");
	}
	
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng kí</title>
	<meta charset="utf-8">
	<style type="text/css">
		.container{
			width: 450px;
			height: 530px;
			border: 1px #00FFFF solid;
			margin: auto;
			padding: auto;
			text-align: center;
			margin-top: 130px;
			background-color: white
			border-radius:4px;
		}
		.button1{
  			background-color:skyblue; 
  			border-radius: 12px;
  			color: white;
  			padding: 10px 30px;
  			text-align: center;
  			text-decoration: none;
  			border-collapse: collapse;
  			display: inline-block;
 			font-size: 12px;
		}
		input{
			width: 200px;
			height: 20px;
			border-radius: 4px;
			margin-top: 5px;
		}
		.show_err{
			border-color: red;
		}

	</style>
	<script type="text/javascript">
		function java(){
		var name =document.getElementById('name');
		var email =document.getElementById('email');
		var phone =document.getElementById('phone');
		var address=document.getElementById('address');
		var pass=document.getElementById('pass');

		var errname=document.getElementById('errname');
		var erremail=document.getElementById('erremail');
		var errphone=document.getElementById('errphone');
		var erraddress=document.getElementById('erraddress');
		var errpass=document.getElementById('errpass');

		var name = name.value.trim();
		var email = email.value.trim();
		var phone = phone.value.trim();
		var address = address.value.trim();
		var pass = pass.value.trim();

		var flagname=false;
		var flagemail=false;
		var flagphone=false;
		var flagaddress=false;
		var flagpass=false;

		var showerror=document.getElementsByClassName('show_err');
		var i;
		for (var i = 0; i < showerror.length; i++) {
			showerror[i].innerHTML="";
		}



		if (name=="") {
			errname.innerHTML="Hay nhap ten!";
			flagname=false;
		}else{
			flagname=true;
		}
		if (email=="") {
			erremail.innerHTML="Hay nhap email!";
			flagemail=false;
		}else{
			flagemail=true;
		}

		if (phone=="") {
			errphone.innerHTML="Hay nhap so dien thoai!";
			flagphone=false;
		}else{
			flagphone=true;
		}

		if (address=="") {
			erraddress.innerHTML="Hay nhap dia chi!";
			flagaddress=false;
		}else{
			flagaddress=true;
		}

		if (pass=="") {
			errpass.innerHTML="Hay nhap mat khau!";
			flagpass=false;
		}else{
			flagpass=true;
		}

		if (flagname==true && flagemail==true && flagphone==true && flagaddress==true && flagpass==true) {
			return true;
		}else{
			return false;
		}




		}
	</script>
</head>
<body>
	<div class="container">
	<h1 style="color: #00FFFF">Đăng kí</h1>
	<h2><?php echo $error; ?></h2>
	<form method="POST" onsubmit="return java()">
		<input type="text" name="name" placeholder="Name" id="name"><br>
		<span id="errname" class="show_err" style="color:red "></span>
		<br>
		<input type="email" name="email" placeholder="Email" id="email"><br>
		<span id="erremail" class="show_err" style="color:red "></span>
		<br>
		<input type="tel" name="phone_no" placeholder="Phone" id="phone"><br>
		<span id="errphone" class="show_err" style="color:red "></span>
		<br>
		<input type="text" name="address" placeholder="Address" id="address"><br>
		
		<span id="erraddress" class="show_err" style="color:red "></span>
		<br>
		<input type="password" name="pass" placeholder="Password" id="pass"><br>
		<span id="errpass" class="show_err" style="color:red "></span>
		<br>
		<br>
		<button class="button1" type="submit" name="btn">Register</button>
	</div>
	</form>
</body>
</html>