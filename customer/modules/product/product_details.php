<?php 
	$id=$name=$price=$mota=$idtype=$url=$status="";
	if (isset($_GET['id'])) {
		 $id=$_GET['id'];
		 $sql="SELECT * FROM products WHERE id='$id'";
		 $result = mysqli_query($conn,$sql);
	if($result == false){
		echo "Error: ".mysqli_error($conn);
		mysqli_close($conn);
	}
	else{
		if(mysqli_affected_rows($conn) > 0){
			$row = mysqli_fetch_assoc($result);
			$name = $row['name'];
			$price=$row['price'];
			$mota=$row['mota'];
			$status=$row['status'];
			$url =$row['image'];
			$type=$row['id_type'];


		}
		else{
			header("Location:index.php?module=product&action=list");
	}
}
}
	
 ?>
<?php 
$title="Sedan";
require_once("layout/header.php");
 ?>
<style type="text/css">
    .chitietsanpham{
        padding: 16px;
    }
    }
    .chitietsanpham .item{
        min-width: 300px;
        text-align: center;
        box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
    }
    .chitietsanpham .item:hover{
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
    }
    	#main-menu1 ul{
			list-style-type: none;
		}
		#main-menu1 li{
			display: inline-block;
			width: 250px;
			height: 10vh;
			line-height: 10vh;
			background-color: #3366CC4D;
			border-radius: 30px;
		}
		#main-menu1 a{
			display: block;
			text-align: center;
			text-decoration: none;
			-webkit-transition-duration: 0.4s; 
  			transition-duration: 0.4s;
  			color: black;
		}
		#main-menu1 a:hover{
			color:red;
			background-color: white;
		}
		#main-menu1 a:active{
			color:#66FF33;
			background-color: white;
		}
		#main-menu1 li{
			position: relative;
		}
		.sub-menu{
			z-index: 9999;
			display: none;
			position: absolute;
		}
		#main-menu1 li:hover .sub-menu{
			display: block;

		}
		.a{
			text-decoration: none;
			color: black;
		}
		#image{
			margin: 30px;
			float: left;
			width:30%;

		}
		#left{
			float: left;
			margin-top: 30px;
			margin-left: 250px;
		}

</style>
<img src="" alt="">
	<div id="chitietsanpham">
		<?php 
		echo "<div id='image'>";
			echo "<img src='$url' width='100%'>";
		echo "</div>";	
		echo "<div id='left'>";
			echo "<h3>Tên Sản Phẩm:".$name."</h3>";
			echo "<h3>Giá Sản Phẩm:".$price."</h3>";
			echo "<h3>Tình Trạng đơn hàng:";
			if ($status==1) {
				 echo "Còn Hàng";
				 				}
			else if ($status==0){
				 	echo "Hết hàng";
				 				}
			else if ($status==2){
				 	echo "Hàng sắp về";
				 				}
			else if ($status==-1){
				 	echo "Không kinh doanh";
				 				}

			echo "</h3>";
			echo "<h4>Mô tả món ăn:".$mota."</h4>";

		echo "</div>";
		 ?>
	</div>
 <?php require_once("layout/footer.php") ?>