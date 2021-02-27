<?php 
if (!isset($_SESSION['admin'])) {
	header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
			box-sizing: border-box;
		}
		body{
			background-color: gray;
		}
		.container{
			width: 1300px;
			height: 100vh;
			margin: auto;
			padding: auto;
			background-color: white;


		}
		.header{
			height: 15vh;
			line-height: 10vh;
			padding-left: 16px;
			padding-right: 16px;
			border-bottom: 1px dotted gray;
		}
		.main-menu{
			height: 90vh;
			width: 250px;
			background-color:#8B4500;
			float: left;
		}
		.content{
			height: 90vh;
			width: 80%;
			float: left;
			background-color: white;
			overflow: auto;
		}
		.main-menu ul{
			list-style-type: none;
			font-size: large;
		}
		.main-menu li{
			height: 60px;
			line-height: 60px;
		}
		.main-menu a{
			text-decoration: none;
			color: white;
			display: block;
			padding-left: 20px;
			border-bottom: 1px solid black;
		}
		.main-menu a:hover{
			background-color: #fff1e1;
			color: #1d3c45;
		}
		.button{
			background-color: white; 
  			color: black; 
  			border: 2px solid crimson;
  			padding: 5px 5px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 10px;
  			margin: 20px 2px;
  			-webkit-transition-duration: 0.4s; 
 			transition-duration: 0.4s;
  			cursor: pointer;
  			border-radius: 4px;
		}
		.button:hover {
  			background-color: crimson;
  			color: white;
  		}
  		a:active{
			text-decoration: none;
			color: #00405d;
		}
		a:hover{
			text-decoration: none;
			color: #FFCC00;
		}
		a{
			text-decoration: none;
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
					
					<img style="float: left;" src="images/logo3.png" alt="" width=23% >
					
			<button class="button" style="float:right;margin-top:29px;"><a  href="index.php?module=common&action=logout">Log out</a></button>
			<?php 
				if (isset($_SESSION['admin'])) {
					echo "<h3 style='float:right;margin-right:10px;margin-top:10px;'>".$_SESSION['admin']['name']."</h3>";
				}
			 ?>
		</div>
		<div class="main-menu">
			<ul>
				<li>
					<a href="index.php?module=invoices&action=list"><i class="fa fa-credit-card-alt"></i> Quản lí hóa đơn</a>
				</li>
				<li>
					<a href="index.php?module=product&action=list"><i class="fa fa-cart-plus"></i> Quản lí sản phẩm</i></a>
				</li>
				<li>
					<a href="index.php?module=types&action=list"><i class="fa fa-navicon"></i> Quản lí loại</a>
				</li>
				<li>
					<a href="index.php?module=brands&action=list"><i class="fa fa-id-card"></i> Tài Khoản khách hàng</a>
				</li>
				<li>
					<a href="index.php?module=brands&action=list"> <i class="fa fa-share-square"></i>Phản Hồi</a>
				</li>
			</ul>
		</div>
		<div class="content">