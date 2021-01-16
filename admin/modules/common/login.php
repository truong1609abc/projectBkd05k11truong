<?php 
	$error="";
	if (isset($_POST['btn'])) {
		$email =$_POST['email'];
		$pass =md5($_POST['pass']);

		$sql ="SELECT id_admin,name FROM admin WHERE email='$email' AND pass ='$pass'";
		$result = mysqli_query($conn,$sql);
		if ($result==false) {
			$error=mysqli_error($conn);
		}else{
			if (mysqli_num_rows($result)==1) {
				$row =mysqli_fetch_assoc($result);
				$_SESSION['admin']['id'] =$row['id_admin'];
				$_SESSION['admin']['name']=$row['name'];
				header("Location:index.php?module=product&action=list");
			}
			else{
				$error="Thông tin tài khoản không chính xác vui lòng nhập lại!";
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
			height: 400px;
			border: 1px solid black;
			border-radius: 7px;
			margin: auto;
			border-collapse: collapse;
			text-align: center;
			margin-top: 200px;
			background-color: #CFCFCF4D;

		}
		input{
			margin-top: 40px;
			width: 300px;
			height: 20px;
			border-radius: 6px;

		}
		button{
			margin-top: 30px;
			height: 40px;
			width: 100px;
			border-radius: 4px;
			font-size: 16px;

		}
		body{
			background-image: url(images/logo5.png);
			background-size: cover;
			background-repeat: no-repeat;
			box-sizing: border-box;

		}
		.show_err{
			border-color: red;
		}
	</style>
	<script type="text/javascript">
		function java(){
			var email=document.getElementById('email');
			var errorname=document.getElementById('errorname');

			var pass=document.getElementById('pass');
			var errorpass=document.getElementById('errorpass');

			var showerror=document.getElementsByClassName('show_err');
			var i;
			for (var i = 0; i < showerror.length; i++) {
				showerror[i].innerHTML="";
			}

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
		<h1 style="color:#00008B">Đăng Nhập</h1>
		<?php 
			echo "<h3 style='color:#FF0000;font-size:15px;'>";
				echo $error;
			echo "</h3>";
		 ?>
		<form method="POST" onsubmit="return java()">
       	<input type="text" name="email" id="email" placeholder="Hãy Nhập Email">
       	<br>
       	<span id="errorname" class="show_err" style="color: #B22222;font-size:20px;"></span>
       	<br>
       	<input type="password" name="pass" id="pass" placeholder="Hãy Nhập Mật Khẩu">
       	<br>
       	<span id="errorpass" class="show_err" style="color:#B22222;font-size:20px;"></span>
       	<br>
       	<button type="submit" name="btn">Đăng nhập</button>

       </form></div>
</body>
</html>