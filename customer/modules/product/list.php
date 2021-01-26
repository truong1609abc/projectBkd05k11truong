<?php 
    $sql="SELECT id,name,image,price,mota FROM products";

    if (isset($_GET['keyword'])) {
        $keyword=$_GET['keyword'];
        $sql=$sql." WHERE name LIKE '%$keyword%' ";
    }
    $result=mysqli_query($conn,$sql);
    if ($result==false) {
        $error="Error: ".mysqli_error($conn);
        mysqli_close($conn);
        die($error);
    }
?>
<?php 
	$sql="SELECT id,name,image,price,mota FROM products";
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		else{
			$page = 1;
		}


		$tong_sp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(id) as 'tong_sp' FROM `products`"))['tong_sp'];
		$limit = 8;
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
    .list_sedan{
        padding: 16px;
    }
    .list_sedan form{
        width: 360px;
        margin: auto;
        text-align: center;
    }
    .list_sedan table{
        margin: 16px;
    }
    .list_sedan .item{
        min-width: 300px;
        text-align: center;
        box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
    }
    .list_sedan .item:hover{
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
		.item1{
			width: 450px;
			height: 250px;
			text-align: center;
			margin: 200px;

		}
		.item1:hover{
			box-shadow: 5px 10px 18px black;
		}
		.item1:hover b{
			font-size: larger;
			color:green;
		}
		.item1:hover img{
			width: 350px;
		}


</style>
<div class="list_sedan">

    <form style="margin-top:50px;">
        <input type="hidden" name="module" value="product">
        <input type="hidden" name="action" value="list">
        <input type="text" name="keyword" placeholder="Bạn cần tìm gì?">
        <button type="submit">Tìm kiếm</button>
    </form>
    <br>
    <a href="index.php?module=product&action=list&page=<?php if($page > 1) {echo ($page-1);} else echo $page; ?>">Previous</a>
    <b><?php echo $page; ?></b>
    <a href="index.php?module=product&action=list&page=<?php if($page < $tong_so_trang) {echo ($page+1);} else echo $page; ?>">Next</a>
    <table id="table">
        <?php 
            $total=mysqli_num_rows($result);
            if (isset($keyword)) {
                echo "<h2 style='color:red'>Có tất cả $total kết quả cho: $keyword </h2>";
            }
            $count=0;
            $n= 4;
            while ($count!=$total) {
                echo "<tr>";
                    while ($row=mysqli_fetch_assoc($result)) {
                        $count++;
                        echo "<td class='item1'>";
                        	$id=$row['id'];
                            $image=$row['image'];
                            $name=$row['name'];
                            $price=$row['price'];
                            $mota=$row['mota'];
                            echo "<a href='index.php?module=product&action=product_details&id=$id'>";
                            echo "<img src='$image' width='80%'><br>";
                            echo "<b>".$row['name']."</b><br>";
                            echo "<b style='color:red'>".$row['price']."</b><br>";
                            echo "</a>";

                        echo "</td>";
                        if ($count%4==0) break;   
                    }
                echo "</tr>";
            }



         ?>
    </table>
</div>
 <?php require_once("layout/footer.php") ?>