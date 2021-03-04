<?php 
    $keyword="";
    $sql="SELECT id,name,image,price,mota FROM products WHERE id_type=3";
    if (isset($_GET['keyword'])) {
        $keyword=$_GET['keyword'];
        $sql=$sql." AND name LIKE '%$keyword%'";
    }

    if(isset($_POST['btn'])) {
        $keyword=$_POST['keyword'];   
        header("location:index.php?module=product&action=1&keyword=$keyword");
    
    }

    $result=mysqli_query($conn,$sql);
    if ($result==false) {
        $error="Error: ".mysqli_error($conn);
        mysqli_close($conn);
        die($error);
    }


?>

<?php 
$title ="Lee Bee";
require_once("layout/header1.php")

  ?>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0" > 
<style type="text/css">
	.tamly{
		padding: 16px;
		line-height: 16px;
		cursor: pointer;
		float: left;
	
	}
	.tamly .item{
		min-width: 200px;
		text-align: center;
		box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	}
	.tamly .item:hover{
		box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
	}
	</style>

	<div class="container-fluid"   id="aboutus" >
    	<br>
    	<br>
    	<h1 align="center">About Us</h1>
    	
    	<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="800000"  >
    		<ol class="carousel-indicators">
    			<li data-target="#carousel" data-slide-to="0" class="active"></li>
    			<li data-target="#carousel" data-slide-to="1" ></li>
    			<li data-target="#carousel" data-slide-to="2"></li>
    			<li data-target="#carousel" data-slide-to="3"></li>
    		</ol>
    		<div class="carousel-inner" role="listbox" style="height:600px;">
    			<div class="item active">
    				<img src="images/anh6.jpg" alt="" width="100%" >
    				
    			</div>
    			<div class="item" >
    				<img src="images/anh2.jpg" alt="" width="100%"    >
    			</div>
    			<div class="item">
    				<img src="images/anh1.jpg" alt="" width="100%" >
    				
    			</div>
    			<div class="item">
    				<img src="images/anh7.jpg" alt="" width="100%" >
    				
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
    <div id="list" class="container">
    <table id="table">
       <?php 
            $total=mysqli_num_rows($result);
            if ($keyword!="") {
                echo "<h2 style='color:red'>Có tất cả $total kết quả cho: $keyword </h2>";
            } 

            $count=0;
            $n= 4;
            while ($count!=$total) {
                echo "<tr>";
                    while ($row=mysqli_fetch_assoc($result)) {
                        $count++;
                        echo "<div class='col-sm-4  >";
                        echo "<td >";
                            $id=$row['id'];
                            $image=$row['image'];
                            $name=$row['name'];
                            $price=$row['price'];
                            echo "<a href='index.php?module=product&action=product_details&id=$id'>";
                            echo "<img src='$image' width='85%'><br>";
                            echo "</a>";
                            echo "<b style='font-size:25px;color:black;margin-left:20%'>".$row['name']."</b><br>";
                            echo "<b style='font-size:15px;color:black ;margin-left:20%'> Giá:".$row['price']."VNĐ</b><br>";
                            echo "<a href='index.php?module=invoices&action=cart&id_product=$id'><button style='boder:1px solid white;color:black;background-color:#FFFFFF4D;font-size:15px;margin-left:20% '><b>Thêm vào giỏ hàng</b></button></a>";
                        echo "</td>";
                        echo "</div>";
                        if ($count%4==0) break;   
                    }
                echo "</tr>";
            }



         ?>
    </table>

 <?php require_once("layout/footer.php") ?>