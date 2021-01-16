<!DOCTYPE html>
<html lang="en">
<head>
  <title>KLC FOOD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

.datdoan{
  border-radius: 25px;
  border: 2px solid #73AD214D;
  padding: 20px;
  margin-left: 5%;
  width: 90%;
  height: 200px;
  text-align: center;
  margin-top: 100px;
}
button{
	font-size: 25px;
	background-color: #00FF66;
	border-radius:4px;
}

.datdoan a {
	text-decoration: none;
}
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


  </style>
</head>
<body>
	<nav class="navbar navbar-inverse varbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php?module=common&action=home" class="navbar-brand">KLC FOOD</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="">Trang chu</a></li>
				<li><a href="">Trang chu</a></li>
				<li><a href="">Trang chu</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-edit"></span>Đăng ký</a></li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">Đăng Nhập <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="index.php?module=common&action=login">Customer</a></li>
					<li><a href="../admin/index.php?module=common&action=login">Manager</a></li>
					</ul>
				</li>
			</ul>
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
    <div class="container-fluid" style="margin-top: 30px;" >
    	<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="500">
    		<ol class="carousel-indicators">
    			<li data-target="#carousel" data-slide-to="0" class="active"></li>
    			<li data-target="#carousel" data-slide-to="1" ></li>
    			<li data-target="#carousel" data-slide-to="2"></li>
    		</ol>
    		<div class="carousel-inner" role="listbox">
    			<div class="item active">
    				<img src="images/logo5.png" alt="" width="100%" >
    			</div>
    			<div class="item">
    				<img src="images/logo2.png" alt="" width="100%" >
    			</div>
    			<div class="item">
    				<img src="images/logo3.png" alt="" width="100%" >
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
    <div id="doanphobien" class="container-fluid text-center" style="margin-top:100px; : " >
    	<h1 style="color: red;">Đồ Ăn Nổi Tiếng</h1>
    	<br>
    	<h3>Bạn muốn thưởng thức chứ?</h3>
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
    <div class="datdoan">
    <h2>Feeling Hungry?</h2>
    <br>
   <button><a href="">Order Now</a></button>
    </div>
</body>
</html>