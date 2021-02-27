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

<?php 
$title = "Đăng Ký";
require_once("layout/header.php") ?>
	<style type="text/css">
		.container{
			width: 550px;
			height: 550px;
			border: 1px solid white ;
			margin: auto;
			margin-top: 50px;
			text-align: center;
			border-radius:20px;
		}
		.button1{
  			border-radius: 12px;
  			color: white;
  			padding: 10px 30px;
  			text-align: center;
  			text-decoration: none;
  			border-collapse: collapse;
  			display: inline-block;
 			font-size: 22px;
 			background-color: black;
 			outline: none;
		}
		input{
			margin-top: 20px;
			width: 300px;
			height: 30px;
			border-radius: 6px;

		}
		.show_err{
			color: red;
			margin-top: 30px;
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
			errname.innerHTML="Hãy Nhập Tên!";
			flagname=false;
		}else{
			flagname=true;
		}
		if (email=="") {
			erremail.innerHTML="Hãy Nhập Email!";
			flagemail=false;
		}else{
			flagemail=true;
		}

		if (phone=="") {
			errphone.innerHTML="Hãy Nhập Số Điện Thoại!";
			flagphone=false;
		}else{
			flagphone=true;
		}

		if (address=="") {
			erraddress.innerHTML="Hãy Nhập Địa Chỉ!";
			flagaddress=false;
		}else{
			flagaddress=true;
		}

		if (pass=="") {
			errpass.innerHTML="Hãy Nhập Mật Khẩu!";
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
	<h1 style="color: white;margin-top: 50px; ">Đăng kí</h1>
	<h2><?php echo $error; ?></h2>
	<form method="POST" onsubmit="return java()">
		<input type="text" name="name" placeholder="Hãy nhập tên người dùng" id="name"><br>
		<span id="errname" class="show_err" style="color:red;font-size: 15px; "></span>
		<br>
		<input type="email" name="email" placeholder="Hãy nhập Email người dùng" id="email"><br>
		<span id="erremail" class="show_err" style="color:red;font-size: 15px; "></span>
		<br>
		<input type="tel" name="phone_no" placeholder="Hãy nhập số điện thoại" id="phone"><br>
		<span id="errphone" class="show_err" style="color:red;font-size: 15px; "></span>
		<br>
		<input type="text" name="address" placeholder="Hãy nhập địa chỉ sử dụng" id="address"><br>
		
		<span id="erraddress" class="show_err" style="color:red;font-size: 15px; "></span>
		<br>
		<input type="password" name="pass" placeholder="Nhập password bạn muốn sử dụng" id="pass"><br>
		<span id="errpass" class="show_err" style="color:red;font-size: 15px; "></span>
		<br>
		<br>
		<button class="button1" type="submit" name="btn">Register</button></form>
	</div>
	


<?php require_once("layout/footer.php") ?>