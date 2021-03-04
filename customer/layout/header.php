
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		#container{
			width: 100%;
			height: 100%;
			background-color: white;
			
		}
		#logo{
			width: 30%;
			height: 10vh;
			background-color: #99FFFF;
			float: left;
		}
		#timkiem{
			width: 40%;
			height: 10vh;
			background-color: #66FF00;
			float: left;
		}
		#login{
			width: 30%;
			height: 10vh;
			background-color: #00FF99;
			float: left;
		}
		#main-menu{
			width: 100%;
			height: 10vh;
			background-color: white;
			float: left;
			z-index: 99;
			
		}
		#content{
   			height: 100%;
	    	position: fixed;
	    	top: 70px;
	    	left: 0;
			 right: 0;
			 z-index: 0;
  			 background-image: url(images/anhnencus1.jpg);
   			 background-size: cover;
   			 overflow: hidden;
}
		}
		#main-menu ul{
			list-style-type: none;
		}
		#main-menu li{
			display: inline-block;
			width: 250px;
			height: 10vh;
			line-height: 10vh;
			background-color: white;
		}
		#main-menu a{
			display: block;
			text-align: center;
			text-decoration: none;
			-webkit-transition-duration: 0.4s; 
  			transition-duration: 0.4s;
  			color: black;
		}
		#main-menu li{
			position: relative;
		}
		.sub-menu{
			z-index: 9999;
			display: none;
			position: absolute;
		}
		#main-menu li:hover .sub-menu{
			display: block;

		}
		.a{
			text-decoration: none;
			color: black;
		}
		.button {
  			background-color: white; 
  			color: black; 
  			border: 2px solid crimson;
  			padding: 5px 5px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 10px;
  			margin: 4px 2px;
  			-webkit-transition-duration: 0.4s; 
 			transition-duration: 0.4s;
  			cursor: pointer;
  			border-radius: 4px;
		}
		.button:hover {
  			background-color: crimson;
  			color: white;
		}
		
		.active{
			background-color: black;
			color: white;
			font-size: 30px;
			border-radius: 15px;
			font-family: 'Courier';
		}
			</style>

</head>
<body>
	<div id="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid" >
			<div class="navbar-header">
				<a href="index.php?module=common&action=home" class="navbar-brand">KLC FOOD</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php 
				if (isset($_SESSION['customer'])) {
					?>
					<li><h3 style="float:right;margin-right:10px;margin-top:10px;color:white;"><?php echo $_SESSION['customer']['name'] ?></h3></li>
					<li class="dropdown">
						<a href="" class="dropdown-toggle"  data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>Cài Đặt<span class="caret"></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?module=invoices&action=list2">Lịch sử mua hàng</a></li>
								<li><a href="index.php?module=common&action=ifcus">Thôn tin người dùng</a></li>
								<li><a href="index.php?module=common&action=home&id=#contact">Phản Hồi</a></li>
								<li><a href="index.php?module=common&action=doimatkhau">Đổi Mật Khẩu</a></li>
								<li><a href="index.php?module=common&action=logout">Đăng Xuất</a></li>
							</ul>
				 <li>                                            
				<?php 
				}
				 ?>
				<?php 
					if (!isset($_SESSION['customer'])) {
					
				 ?>
				<li><a href=""><span class="glyphicon glyphicon-edit"></span>Đăng ký</a></li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">Đăng Nhập <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="index.php?module=common&action=login">Customer</a></li>
					<li><a href="../admin/index.php?module=common&action=login">Manager</a></li>
					</ul>
				</li>
			</ul>
			<?php 
				}
			 ?>
		</div>
	</nav>
	<br>
		<div id="content" style="position: fixed;top: 50px;">
	<div id="main-menu1" style="margin-left:10px;margin-top:40px;">
			<ul>
				<li>
					<a href="index.php?module=product&action=list" class="<?php if($action=='list') echo"active"; ?>"><b>Đồ Ăn Việt</b></a>
				</li>
				<li >
					<a href="index.php?module=product&action=1" class="<?php if($action=='1') echo"active"; ?>"><b>Đồ Ăn Tây Âu</b></a>
				</li>
				<li>
					<a href=""><b>Đồ Ăn Nhanh</b></a>
				</li>
				<li>
					<a href=""><b>Tráng Miệng</b></a>
				</li>
				<li>
					<a href=""><b>Đồ Uống</b></a>
				</li>
			</ul>
		</div>
