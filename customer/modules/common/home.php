<?php 
	if (isset($_POST['btn'])) {
		$name=$_POST['name'];
		$sodienthoai=$_POST['sodienthoai'];
		$ykien=$_POST['ykien'];
		
		if (!isset($_SESSION['customer'])) {
			die();
			header('location:index.php?module=common&action=login');
		}else{
			$id=$_SESSION['customer']['id_customer'];
			$sql="INSERT INTO phanhoi VALUES (NULL,'$name',current_timestamp(),'$sodienthoai','$ykien','$id')";
			$result=mysqli_query($conn,$sql);

		if ($result==false) {
			echo "ERROR".mysqli_error($conn);
		}else{
			header("Location:index.php?module=common&action=home");
		}
	}
}
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KLC FOOD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script>
$(document).ready(function(){
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
   
        window.location.hash = hash;
      });
    } 
  });
})
</script>
  <style type="text/css">
  	body {
    line-height: 1.8;
    color: #818181;
    background-color: #F5F5F54D;

  }
  h1,h4,h3,p{
  	 font-family: "Times New Roman";
  }
  	.wide {
  width:100%;
  height:750px;
  background-size:cover;
}

.wide img {
  width:100%;
  border-radius: 10px;

}

.tieude {
  text-align: center;
  font-size: 60px;
  color:skyblue;
  text-shadow: 2px 2px 5px black;
  font-family: "Times New Roman";
  position: absolute;
  top: 52%;
  left: 34%;
  margin-top: 80px;
}

.logo {
  color:#fff;
  font-weight:800;
  font-size:25px;
  padding:25px;
  text-align:center;
}

.line {
  padding-top:20px;
  overflow:hidden;
  text-align:center;
  padding: 10px; 

}
`
.doannotieng1 {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .doannotieng1 img {
    width: 80%;
    height: 80%;
    margin-bottom: 10px;
  }
  
  .doannotieng1 img:hover{
  	width: 100%;
  	height: 100%;
  }
  .button1{
			background-color: white; 
  			color: black; 
  			border: 2px solid crimson;
  			padding: 5px 5px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			margin: 1px 1px;
  			-webkit-transition-duration: 0.4s; 
 			transition-duration: 0.4s;
  			cursor: pointer;
  			border-radius: 4px;
  			font-size: 20px;
	}
	.button1:hover {
  			background-color: red;
  			color: white;
  	}
  
  </style>
  <script type="text/javascript">
	function OrderConfirm(){
		return confirm ("Bạn có chắc chắn bạn muốn gửi phản hồi và quay về trang chủ!");
	}
</script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid" >
			<div class="navbar-header">
				<a href="index.php?module=common&action=home" class="navbar-brand">KLC FOOD</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#aboutus">About Us</a></li>
				<li><a href="#doanphobien">Famous Food</a></li>
				<li><a href="#quymo">The Scale</a></li>
				<li><a href="#contact">Contact Us</a></li>
			</ul>
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
				<li><a href="index.php?module=common&action=register"><span class="glyphicon glyphicon-edit"></span>Đăng ký</a></li>
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
	<div class="wide">
      	<div class="col-xs-2 line" class="line"><hr></div>
        <div class="col-xs-8 logo" class="logo"><img src="images/logo3.png"></div>
        <div class="col-xs-2 line" class="line"><hr></div>
        <div class="tieude">Good Food is Good Mood</div>
    </div>   
    <br>
    <br>
    <br>
    <br>
    <div class="container" style="margin-top: 30px;"  id="aboutus" >
    	<br>
    	<br>
    	<h1 align="center">About Us</h1>
    	
    	<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="800000" >
    		<ol class="carousel-indicators">
    			<li data-target="#carousel" data-slide-to="0" class="active"></li>
    			<li data-target="#carousel" data-slide-to="1" ></li>
    			<li data-target="#carousel" data-slide-to="2"></li>
    			<li data-target="#carousel" data-slide-to="3"></li>
    		</ol>
    		<div class="carousel-inner" role="listbox" style="height:600px;">
    			<div class="item active">
    				<img src="images/anh6.jpg" alt="" width="100%" >
    				<div class="carousel-caption" style="margin-bottom: 50px;">
					    <h2 style="color:white;">KLC Là viết tắt của Kao Lam Chường</h2>
					    <h4>Là tên của chuỗi nhà hàng cùng tên, nhà chuỗi đã được xây dựng và phát triển từ năm những năm 1920 của thế kỉ trước</h4>
					 </div>
    			</div>
    			<div class="item" >
    				<img src="images/anh2.jpg" alt="" width="100%"    >
    				<div class="carousel-caption" style="margin-bottom: 200px;">
					    <h2 style="color:#666666;">Là chuỗi nhà hàng quy tụy hàng loạt những đầu bếp tầm cỡ Trên thế giới</h2>
					 </div>
    			</div>
    			<div class="item">
    				<img src="images/anh1.jpg" alt="" width="100%" >
    				<div class="carousel-caption" style="margin-bottom: 150px;">
					    <h3 style="color:white ;">Do có nhiều đầu bếp từ nhiều quốc gia khác nhau nên thực đơn của chúng tôi vô cùng đa dạng và phong phú </h3>
					 </div>
    			</div>
    			<div class="item">
    				<img src="images/anh7.jpg" alt="" width="100%" >
    				<div class="carousel-caption" style="margin-bottom: 50px;">
					    <h2 style="color:#990033;">Chúng tôi tự tin là những lá cờ tiên phong sử dụng công nghệ 4.0 vào bán đồ ăn online</h2>
					 </div>
    			</div>
    		</div>
    		<a href="#carousel" class="left carousel-control" role="button" data-slide="prev" >
    			<span class="glyphicon glyphicon-chevron-left"  style="font-size: 100px;margin-top: -10px;"></span>
    			<span class="sr-only">Previous</span>
    		</a>
    		<a href="#carousel" class="right carousel-control" role="button" data-slide="next" >
    			<span class="glyphicon glyphicon-chevron-right" style="font-size: 100px;margin-top: -10px;" ></span>
    			<span class="sr-only">Next</span>
    		</a>
    	</div>
    </div>
    <div id="doanphobien" class="container-fluid text-center" style="margin-top:100px; : "  >

    	<h1 style="color: red;margin-top: 60px;">Đồ Ăn Nổi Tiếng</h1>
    	<br>
    	<h3 style="float: left;margin-left:700px; ">Bạn muốn thưởng thức chứ?</h3>
    	<button class="button1"><a class="xemthemsp" href="index.php?module=product&action=list" style="float: right;margin-right: 10px;"><i class="fa fa-plus-circle"></i>Xem Thêm sản phẩm</a></button><br><br>
    	<div class="row text-center slidenim" >
    		<div class="col-sm-4 ">
    		<a href="" class="anh">	<div class="doannotieng1" style="height: 500px;">
    				<img src="images/logo5.png" alt="" width="500" height="400">
    			</a>
    				<p><strong>Bún đậu mắm tôm</strong></p>
    				<p>Số lượng bán được trung bình trong ngày:<strong>20000 suất</strong></p>
    			</div>

    	</div>
    	<div class="col-sm-4 " >
    			<div class="doannotieng1" style="height: 500px;">
    				<img src="images/logo2.png" alt="" width="500" height="400">
    				<p><strong>Bún đậu mắm tôm</strong></p>
    				<p>Số lượng bán được trung bình trong ngày:<strong>20000 suất</strong></p>
    			</div>
    	</div>
    	<div class="col-sm-4 " style="height: 500px; ">
    			<div class="doannotieng1" style="height: 500px;">
    				<img src="images/logo3.png" alt="" width="500" height="400">
    				<h2><strong>Bún đậu mắm tôm</strong></h2>
    				<p>Số lượng bán được trung bình trong ngày:<strong>20000 suất</strong></p>
    			</div>
    		</div>
    	</div>
    	<div class="row text-center slidenim" >
    		<div class="col-sm-4 ">
    		<a href="" class="anh">	<div class="doannotieng1" style="height: 500px;">
    				<img src="images/logo5.png" alt="" width="500" height="400">
    			</a>
    				<p><strong>Bún đậu mắm tôm</strong></p>
    				<p>Số lượng bán được trung bình trong ngày:<strong>20000 suất</strong></p>
    			</div>

    	</div>
    	<div class="col-sm-4 " >
    			<div class="doannotieng1" style="height: 500px;">
    				<img src="images/logo2.png" alt="" width="500" height="400">
    				<p><strong>Bún đậu mắm tôm</strong></p>
    				<p>Số lượng bán được trung bình trong ngày:<strong>20000 suất</strong></p>
    			</div>
    	</div>
    	<div class="col-sm-4 " style="height: 500px; ">
    			<div class="doannotieng1" style="height: 500px;">
    				<img src="images/logo3.png" alt="" width="500" height="400">
    				<h2><strong>Bún đậu mắm tôm</strong></h2>
    				<p>Số lượng bán được trung bình trong ngày:<strong>20000 suất</strong></p>
    			</div>
    		</div>
    	</div>
    </div>	
    <div class="container-fluid bg-grey" id="quymo">	
    	<br>	
    	<h1 align="center">Quy Mô</h1>
    		<div style="width: 100%;height: 30%">
    		<div style="float: left;width: 30%;font-size: 30px;text-align: center;margin-top: 100px;">Hà Nội</div>
    		<div style="float: left;width:70%;">
    			<img src="images/mohinhmienbac.png" class="img-thumbnail" alt="" width="60%" style="margin-left: 160px;">
    		</div>
    	</div>
    	<br>
    	<div style="width: 100%;height: 30%;margin-top:320px; ">
    		<div style="float: left;width: 30%;font-size: 30px;text-align: center;margin-top: 100px;">TP.Hồ Chí Minh</div>
    		<div style="float: left;width:70%;">
    			<img src="images/mohinhmiennam.png" class="img-thumbnail" alt="" width="60%" style="margin-left: 160px;">
    		</div>
    	</div>
    </div>
    <div class="container-fluid bg-grey" id="contact">
    	<br>
    	<div style="width:100%">
    	<h1 align="center">Contact</h1>
    	<div id="div1" style="width:40%;float: left;text-align: center; ">
    		<label>
    		<p> Liên hệ với chúng tôi và chúng tôi sẽ liên hệ lại với bạn trong vòng 24 giờ. </p>
    		<p><span class="glyphicon glyphicon-map-marker"></span>Như Quỳnh ,Văn Lâm,Hưng Yên</p>
      		<p><span class="glyphicon glyphicon-phone"></span> +0969696969</p>
      		<p><span class="glyphicon glyphicon-envelope"></span> Younowwereare2@gmail.com</p></label>
      		<br>	
      		<div>
      				<form method="POST" enctype="multipart/form-data">
    		<label >
    			<input type="text" placeholder="Tên:" required="" name="name" style="width: 190px;">
    		</label>
    		<br>	
    		<br>	
    		<label>
    			<input type="number" placeholder="Số Điện Thoại:" required="" name="sodienthoai" style="width: 300px;">
    		</label>
    		<br>
    		<label>
    		<textarea placeholder="Ý kiến của bạn" rows="5" cols="70" name="ykien" style="margin-top: 30px;"></textarea>
    		</label>
    		<br>
    		<label >
    		<button style="float: left;font-size: 20px;" type="submit" name="btn" onclick='return OrderConfirm()'>Gửi</button></label>
    	</form>
      		</div>
    	</div>
    	<div id="div2" style="width: 60%;float: left;">
    		<div style="width: 100%" style="float: left;">
    				<img src="images/anhend.jpg" class="img-thumbnail" alt=""  width="90%" style="margin-left: 100px;">
    		</div>
    	</div>
    </div>
</div>
		<div style="background-color: #222222;width: 100%;height: 14vh;color: white;margin-top:0px;">
				<div style="width: 100%;height: 10vh;float: left;text-align: center;padding: 1vh;" >	
				<a href="https://www.facebook.com/"><i class="fa fa-facebook-square" style="font-size: 36px;color:white;margin-left:35px;"></i></a>
				<a href=""><i class="fa fa-youtube-play" style="font-size:36px;color: white;margin-left:35px;"></i></a>
				<a href=""><i class="fa fa-instagram" style="font-size:36px;color: white;margin-left:35px;"></i></a>
				<a href=""><i class="fa fa-twitter" style="font-size:36px;color: white;margin-left:35px; "></i></a>
				<p style="color: white;font-size: 18px; ">Liên hệ với chúng tôi</p></div>	
				<div style="background-color:#363636;width: 100%;height: 4vh;float: left; ">	
						<p align="center" style="color: white;">Copyright © 2018-2021 KLC.Send To.My Wife In The Future</p>
				</div>
		</div>
</body>
</html>