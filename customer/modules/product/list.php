<?php 
	$keyword="";
    $sql="SELECT id,name,image,price,mota FROM products WHERE id_type='2'";

    if (isset($_GET['btn'])) {
        $keyword=$_GET['keyword'];
        $sql=$sql."AND name LIKE'%$keyword%' ";
    }
    $result=mysqli_query($conn,$sql);
    if ($result==false) {
        $error="Error: ".mysqli_error($conn);
        mysqli_close($conn);
        die($error);
    }


		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		else{
			$page = 1;
		}


		$tong_sp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(id) as 'tong_sp' FROM products"))['tong_sp'];
		$limit = 4;
		$tong_so_trang = ceil($tong_sp/$limit);


		if($page > $tong_so_trang){
			$page = $tong_so_trang;
		}

		if($page < 1){
			$page = 1;
		}


		$offset = ($page - 1)* $limit;


		$sql = $sql." LIMIT $offset,$limit";


	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		$error =mysqli_error($conn);
		mysqli_close($conn);
		die("Thoat");
	}

 ?>



<?php 
$title="Sedan";
require_once("layout/header.php");
 ?>
<style type="text/css">
    .list_1{
        padding: 20px;
    }
    .list_1 form{
        margin: auto;
        text-align: center;
        z-index: 9999;
        
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
		.item1{
			width: 430px;
			height: 330px;
			text-align: center;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
			border-radius: 15px;
			border: 2px solid white ;

		}
		.item1:hover{
		box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
		}
		.item1:hover b{
			font-size: larger;
			color:#000000;
		}
		#table {
			border-spacing: 40px;
			border-collapse: separate;
			margin: auto;
		}
		.list{
			margin: 0px;
		}
</style>
  <a  href="index.php?module=product&action=list&keyword= <?php echo $keyword; ?>&page=<?php if($page > 1) {echo ($page-1);} else echo $page; ?>">Previous</a>
    <b style="color: white ;"><?php echo $page; ?></b>
    <a href="index.php?module=product&action=list&keyword=<?php echo $keyword; ?>&page=<?php if($page < $tong_so_trang) {echo ($page+1);} else echo $page; ?>">Next</a>
<div class="list_1">

    <form style="margin-top:50px;" method="GET">
        <input type="hidden" name="module" value="product">
        <input type="hidden" name="action" value="list">
        <input type="text" style="width:500px;border-radius:5px;outline: none;"  name="keyword" placeholder="Bạn cần tìm gì?">
        <button type="submit" style="width: 100px;border-radius:5px;outline: none;background-color: #0066994D;color:white;" name="btn">Tìm kiếm
    </form></div>
    <div id="list">
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
                        echo "<div >";
                        echo "<td class='item1'>";
                        	$id=$row['id'];
                            $image=$row['image'];
                            $name=$row['name'];
                            $price=$row['price'];
                            $mota=$row['mota'];
                            echo "<a href='index.php?module=product&action=product_details&id=$id'>";
                            echo "<img src='$image' width='85%'><br>";
                            echo "</a>";
                            echo "<b style='font-size:25px;color:white ;'>".$row['name']."</b><br>";
                            echo "<b style='font-size:15px;color:white ;'> Giá:".$row['price']."VNĐ</b><br>";
                       		echo "<a href='index.php?module=invoices&action=cart&id_product=$id'><button style='boder:1px solid white;color:black;background-color:#FFFFFF4D;font-size:15px; '><b>Thêm vào giỏ hàng</b></button></a>";
                        echo "</td>";
                        echo "</div>";
                        if ($count%4==0) break;   
                    }
                echo "</tr>";
            }



         ?>
    </table>
</div>
 <br>
    <a st href="index.php?module=product&action=list&keyword=$keyword&page=<?php if($page > 1) {echo ($page-1);} else echo $page; ?>">Previous</a>
    <b><?php echo $page; ?></b>
    <a href="index.php?module=product&action=list&keyword=$keyword&page=<?php if($page < $tong_so_trang) {echo ($page+1);} else echo $page; ?>">Next</a>
 <?php require_once("layout/footer.php") ?>