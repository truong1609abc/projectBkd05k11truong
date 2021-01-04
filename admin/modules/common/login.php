<?php 
	$error="";
	if (isset($_POST['btn'])) {
		$email =$_POST['email'];
		$pass =md5($_POST['pass']);

		$sql ="SELECT id,name FROM admin WHERE email='$email' AND pass ='$pass'";
		$result = mysqli_query($conn,$sql);
		if ($result==false) {
			$error=mysqli_error($conn);
		}else{
			if (mysqli_num_rows($result)==1) {
				$row =mysqli_fetch_assoc($result);
				$_SESSION['admin']['id'] =$row['id'];
				$_SESSION['admin']['name']=$row['name'];
				header("Location:index.php?module=product&action=list");
			}
			else{
				$error="Thong tin tai khoan ko chinh xac";
			}
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style type="text/css">
		#container{
			width: 500px;
			height: 500px;
			border: 1px solid black;
			border-radius: 3px;
			margin: auto;
			border-collapse: collapse;
			text-align: center;
			margin-top: 100px;

		}
		input{
			margin-top: 40px;
			width: 300px;
			height: 20px;
			border-radius: 2px;

		}
		button{
			margin-top: 30px;
			height: 30px;
			width: 100px;

		}
	</style>
	<script type="text/javascript">
		function java(){
			var email=document.getElementById('email');
			var errorname=document.getElementById('errorname');

			var pass=document.getElementById('pass');
			var errorpass=document.getElementById('errorpass');

			var email =email.value.trim();
			var pass=pass.value.trim();
			var flagemail =false ;

			if (email=="") {
				errorname.innerHTML="Hãy Nhập Email!"
				flagemail= false
			}else{
				flagemail= true
			}
			var  flagpass= false;
			if (pass=="") {
				errorpass.innerHTML="Hãy Nhập pass!"
				flagpass= false
			}else{
				flagpass= true
			}
			if (flagpass== true  && flagpass== true) {
				return true;
			}else{
				return false ;
			}
			}

	</script>
</head>
<body>
	<div id="container">
		<h1>Đăng Nhập</h1>
		<?php 
			echo "$error";
		 ?>
		<form method="POST" onsubmit="return java()">
       	<input type="text" name="email" id="email" placeholder="Hãy Nhập Email">
       	<br>
       	<span id="errorname" style="color: red;"></span>
       	<br>
       	<input type="password" name="pass" id="pass" placeholder="Hãy Nhập Mật Khẩu">
       	<br>
       	<span id="errorpass" style="color:red;"></span>
       	<br>
       	<button type="submit" name="btn">Dang nhap</button>

       </form></div>
</body>
</html>