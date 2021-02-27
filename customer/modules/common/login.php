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
				$_SESSION['customer']['id_customer'] = $row['id_customer'];
				$_SESSION['customer']['name'] = $row['name'];
				$_SESSION['customer']['pass'] = $row['pass'];
				header("Location:index.php?module=common&action=home");
			}
			else{
				$error="Thong tin tai khoan ko chinh xac";
			}
		}
	}

 ?>
<?php 
$title = "Đăng Nhập";
require_once("layout/header.php") ?>
	<style>
		#head{
			width: 500px;
			height: 450px;
			border: 1px solid white ;
			border-radius: 7px;
			margin: auto;
			text-align: center;
			margin-top: 100px;

		}
		input{
			margin-top: 20px;
			width: 300px;
			height: 30px;
			border-radius: 6px;

		}
		button{
			margin-top: 30px;
			height: 30px;
			width: 100px;
			border-radius: 4px;
			border:2px;

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
	<div id="head">
		<?php echo $error; ?>
		 <h1 style="color: white ;font-size:50px;">Đăng Nhập</h1>
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
      	<h4 style="margin: 5%;color: white ;">
      		Bạn Chưa Có Tài Khoản ?<a href="index.php?module=common&action=register">Đăng kí</a>
      	</h4>
       </form>
   </div>
<?php require_once("layout/footer.php") ?>