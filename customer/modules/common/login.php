<?php 
	$error="";
	if (isset($_POST['btn'])) {
		$email =$_POST['email'];
		$pass =md5($_POST['pass']);

		$sql ="SELECT id_customer,name FROM customer WHERE email='$email' AND pass ='$pass'";
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
	<style>
		#container{
			width: 500px;
			height: 450px;
			border: 1px solid black;
			border-radius: 7px;
			margin: auto;
			border-collapse: collapse;
			text-align: center;
			margin-top: 200px;
			background-color: #F8F8FF5D;

		}
		input{
			margin-top: 40px;
			width: 300px;
			height: 20px;
			border-radius: 6px;

		}
		button{
			margin-top: 30px;
			height: 30px;
			width: 100px;
			border-radius: 4px;
			border:2px;

		}
		body{
			background-image: url(images/logo5.png);
			background-size: cover;
			background-repeat: no-repeat;
		}
		#dangki a{
			text-decoration: none;
		}
		#dangki a:hover{
			color: green;
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
		<?php echo $error; ?>
		 <h1 style="color: skyblue;font-size:50px;">Đăng Nhập</h1>
		<form method="POST" onsubmit=" return java()">
       	<input type="email" name="email" id="email"  placeholder="Nhập Email:">
       	<br>
       	<span id="errorname" class="show_err" style="color: red;"></span>
       	<br>
       	<input type="password" name="pass" id="pass" placeholder="Nhập Mật Khẩu:">
       	<br>
       	<span id="errorpass" class="show_err" style="color: red;"></span>
       	<br>
       	<button type="submit" name="btn">Đăng Nhập</button>
       	<br>
      	<button id="dangki"><a href="index.php?module=common&action=register">Đăng kí</a></button>
       </form>
   </div>
</body>
</html>