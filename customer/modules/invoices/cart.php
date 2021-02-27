<?php 
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang']=array();
}
if (isset($_GET['id_product'])) {
    $id_product=$_GET['id_product'];

    if (isset($_SESSION['giohang'][$id_product])) {
        if (isset($_GET['up'])) $_SESSION['giohang'][$id_product]+=1;
        if (isset($_GET['down'])){
         $_SESSION['giohang'][$id_product]-=1;
         if ($_SESSION['giohang'][$id_product]<0) $_SESSION['giohang'][$id_product]=0;
        }
    }
    else{
        $_SESSION['giohang'][$id_product]=1;
    }
    header("location:index.php?module=invoices&action=cart");
   }



?>



<?php 
$title = "Giỏ hàng";
require_once("layout/header.php") ?>
<style type="text/css">
    .giohang table{
        width: 100%;
    }
    table,tr,td,th{
        border: 1px solid white ;
        border-collapse: collapse;
        text-align: center;
        color: white ;
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
<a href="index.php?module=product&action=list"><button style="margin-left:50px;width: 200px;
height: 50px; font-size: 20px;background-color:#EEEEEE4D;color:black;border: 1px solid white; ">Đặt Đồ Ăn Tiếp</button></a>
<div class="giohang">
    <table style="width: 1000px;margin-left: 300px;margin-top: 10px;">
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    <?php 
        $stt=0;
        $total=0;
        foreach($_SESSION['giohang'] as $id_product => $quantity){
            $stt ++;
            $sql="SELECT name,price,image FROM products WHERE id='$id_product'";
            $result=mysqli_query($conn,$sql);
            if ($result==false) echo "Error: ".mysqli_error($conn);
            else{
                $row=mysqli_fetch_assoc($result);
                $name=$row['name'];
                $price=$row['price'];
                $url=$row['image'];

            echo "<tr>";
                echo "<td>".$stt."</td>";
                echo "<td>";
                    echo $name."<br>";
                    $url=$row['image'];
                    echo "<img src='$url' width='50px'>";
                echo "</td>";
                echo "<td>".$price."</td>";
                echo "<td>";
                    echo "<a style='margin-right:16px' href='index.php?module=invoices&action=cart&id_product=$id_product&down'>-</a>";
                    echo $quantity;
                    echo "<a style='margin-left:16px' href='index.php?module=invoices&action=cart&id_product=$id_product&up'>+</a>";
                echo "</td>";
                echo "<td>".($price*$quantity)."</td>";

            echo "</tr>";
            $total += $price * $quantity;
        }
    }
    $_SESSION['total_amount']=$total;
    echo "<tr>";
        echo "<th colspan='4'>Tổng tiền</th> ";
        echo "<td>".$total."VNĐ</td>";
    echo "</tr>";
    ?>
    </table>
    <a href="index.php?module=invoices&action=check_out"><button style="margin-left: 600px;margin-top: 50px; ;width: 400px;
height: 50px; font-size: 30px;background-color:#EEEEEE4D;color:black;border: 1px solid white; ">Thanh Toán</button></a>
</div>




<?php require_once("layout/footer.php") ?>