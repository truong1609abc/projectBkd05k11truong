	<?php 
		if (!isset($_SESSION['admin'])) {
			header("Location:index.php?module=common&action=login");
		}


	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

	<title>
		<?php echo "$title"; ?>
	 </title>
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
			box-sizing: border-box;
		}
		body{
			background-color: grey;
			
		}
		.container{
			width: 1300px;
			height: 100vh;
			margin: auto;
			background-color: white;
			font-family: "Times New Roman";
		}
		.header{
			height: 10vh;
			line-height: 10vh;
			padding-left: 16px;
			border-bottom: 2px dotted gray;
			background-color:skyblue: 
		}
		.main-menu{
			height: 90vh;
			width: 250px;
			float: left;
			background-color: orange;
		}
		.content{
			height: 90vh;
			width: 750px;
			float: left;
			
		}
		.main-menu ul{
			list-style-type: none;
		}
		.main-menu li{
			height: 60px;
			line-height: 60px;
			font-size: large;
		}
		.main-menu a{
			text-decoration: none;
			display: block;
			color: skyblue;
			border-bottom: 1px solid black;
			text-align: center;

		}
		.main-menu a:hover{
			background-color: white;
			color: black;
		}
		#logout{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
				<h2 style="float: left;">Logo</h2>
				<a style="float: right;margin-right: 15px;" id="logout" href="index.php?module=common&action=logout">Logout</a>
				<?php 
				if (isset($_SESSION['admin'])) {
					echo "<h3 style='float:right;margin-right:15px;'>Welcome:".$_SESSION['admin']['name'] ."</h3>";
				}
			 ?>
			</div>
			

		<div class="main-menu">
			<ul>
				<li>
					 <a href="">Quan li hoa don</a>
				</li>
				<li>
					<a href="">Quan li san pham</a>
				</li>
				<li>
					<a href="">Quan li loai</a>
				</li>
				<li>
					<a href="">Tin tuc</a>
				</li>
			</ul>
		</div>
		<div class="content">