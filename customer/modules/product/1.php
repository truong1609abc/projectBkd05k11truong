<?php 
    $sql="SELECT id,name,image,price,mota FROM products WHERE id_type='3'";

    if (isset($_GET['keyword'])) {
        $keyword=$_GET['keyword'];
        $sql=$sql." AND name LIKE '%$keyword%' ";
    }



    $result=mysqli_query($conn,$sql);
    if ($result==false) {
        $error="Error: ".mysqli_error($conn);
        mysqli_close($conn);
        die($error);
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


</style>
<div class="list_sedan">

    <form style="margin-top:50px;">
        <input type="hidden" name="module" value="product">
        <input type="hidden" name="action" value="list">
        <input type="text" name="keyword" placeholder="Bạn cần tìm gì?">
        <button type="submit">Tìm kiếm</button>
    </form>
    <table>
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
                        echo "<td class='item'>";
                            $id=$row['id'];
                            $image=$row['image'];
                            $name=$row['name'];
                            $url=$row['image'];
                            $price=$row['price'];
                            $mota=$row['mota'];
                            echo "<a href='index.php?module=product&action=product_details&id=$id'>";
                            echo "<img src='$url' width='180px'><br>";
                            echo "</a>";
                            echo "<b>".$row['name']."</b><br>";
                            echo "<b style='color:red'>".$row['price']."</b><br>";


                        echo "</td>";
                        if ($count%4==0) break;
                            
                    }
                echo "</tr>";
            }



         ?>
    </table>
</div>
 <?php require_once("layout/footer.php") ?>