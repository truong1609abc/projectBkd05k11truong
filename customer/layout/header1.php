<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
			box-sizing: border-box;
		}
		.container{
			width: 100%;
			height: 100vh;
			margin: auto;
			background-color: white;
		}
		.header{
			height: 15vh;
			padding-right: 16px;
			padding-left: 16px;
			border-bottom: 1px dotted black;
			background-image: url("../public/leebee.jpg");
			background-repeat: no-repeat;
			background-size: 200px 120px;

		}
		.d1{
			height: 5vh;
			width: 100%;
		}
		.d2{
			height: 10vh;
			width: 30%;
			float: left;
		}

		.main-menu{
			height: 85vh;
			width: 15%;
			background-color: #FF99CC7D;
			float: left;
			border-right: 1px dotted black;
			border-radius: 20px;
		}
		.content{
			height:85vh;
			width: 85%;
			overflow: auto;
			float:left;
			margin-left: 0px;
		}
		.main-menu ul{
			list-style-type: none;
			font-size: 18px;

		}
		.main-menu li{
			height: 50px;
			line-height: 50px;

		}
		.main-menu a{
			text-decoration: none;
			color: black;
			display: block;
			border-bottom: 1px dotted black;
			padding-left: 20px;
			
		}
		.main-menu a:hover{
			background-color:#6699FF6D;
			
		}
		.tk{
			line-height: 8vh;
			width: 70%;
		}
		.active{
			background-color: #6699FF6D;
		}
		h3.ds{
	        color: #FFA07A;
	        font-size: 25pt;
	        text-shadow: 5px 2px 4px #FF99CC;
	        font-weight: bold;
	        font-style: lobster;
    	}
       
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="header">
			<div class="d1">
				<?php 
				if(isset($_SESSION['customer'])){
					
					echo "<a style='float: right;' href = 'index.php?module=comeon&action=logout'>Logout</a>";
					echo "<span style='float:right;'>||</span><a href='index.php?module=invoices&action=list' style='float:right'>Lịch Sử Mua Hàng</a>";
					echo "<span style='float:right;'>||</span><h3 style='float:right'>".$_SESSION['customer']['name']."</h3>";

					
				}
				else{
					echo "<a style='float: right;' href = 'index.php?module=comeon&action=register'>Register</a>";
				
					echo "<span style='float:right;'>||</span><a style='float: right;' href = 'index.php?module=comeon&action=login'>Login</a>";
					
				}
			 ?>
			</div>
			<div class="d2">
				<h3 class="ds" style="margin-left: 200px;">LeeBee Book</h3>
				<h2 style="float: left; font-style: " ></h2>
			</div>
				
			
			<div class="tk">
				<input style="height: 4vh; width: 40%; margin-left: 30px;" type="text" name="keyword" placeholder="Tìm Kiếm....">
				<button style=" color: black;font-size: 30px;" type="submit" >Tim</button>
				<a href="index.php?module=invoices&action=cart"><i style="font-size: 20px;" class="fas fa-shopping-cart"></i></a>
				
			</div>
			
		    
		</div>

		<div class="main-menu">
			<ul>
				<li>
					<a class="<?php  if($action=='list') echo 'active' ?>" href="index.php?module=product&action=list">Trang Chủ</a>
				</li>
				<li>
					<a class="<?php  if($action=='thieuNhi') echo 'active' ?>" href="index.php?module=product&action=thieuNhi">Sách Thiếu Nhi</a>
				</li>
				<li>
					<a class="<?php  if($action=='giaoTrinh') echo 'active' ?>" href="index.php?module=product&action=giaoTrinh">Giáo Trình </a>
				</li>
				<li>
					<a class="<?php  if($action=='vanhoc') echo 'active' ?>" href="index.php?module=product&action=vanhoc">Sách Văn Học</a>
				</li>
				<li>
					<a class="<?php  if($action=='tamly') echo 'active' ?>" href="index.php?module=product&action=tamly">Tâm Lý-Kỹ Năng Sống</a>
				</li>
				<li>
					<a class="<?php  if($action=='ngoaingu') echo 'active' ?>" href="index.php?module=product&action=ngoaingu">Sách Ngoại Ngữ</a>
				</li>
				<li>
					<a class="<?php  if($action=='tudien') echo 'active' ?>" href="index.php?module=product&action=tudien">Từ Điển</a>
				</li>
				
				<li>
					<a class="<?php  if($action=='amnhac') echo 'active' ?>" href="index.php?module=product&action=amnhac">Âm Nhạc-Mỹ Thuật</a>
				</li>
				
				<li>
					<a class="<?php  if($action=='chinhtri') echo 'active' ?>" href="index.php?module=product&action=chinhtri">Sách Chính Trị</a>
				</li>
				
				
				
				
			</ul>
		</div>
		<div class="content" class="container">