<?php 
if (isset($_GET['id_invoice'])) {
    $id_invoice=$_GET['id_invoice'];
}
else{
    header("Location:index.php?module=common&action=home");
    die();
}


 ?>


<?php 
$title = "Giỏ hàng";
require_once("layout/header.php") ?>
<style type="text/css">
    .invoice-details table{
        width: 90%;
        margin: auto;
        margin-top: 40px;
    }
    table,tr,td,th{
        border: 1px solid black;
        border-collapse: collapse;
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
        }
        .list{
            margin: 0px;
        }
        th,tr,td {
            border: 1px solid white ;
            text-align: center;
            color: white ;
            font-size: 15px;
        }
        h4{
            margin-left: 100px;
            color: white ; 
             font-size: 30px;
            
            margin-top: 10px;
        }
        .invoice-details{
            width: 1500px;
            height: 900px;
            border: 3px solid white ;
            border-radius:20px;
            margin-top: 20px;
            margin-left: 100px;
        }
</style>
<div class="invoice-details">
        <?php  
        $sql="SELECT * FROM invoices WHERE id='$id_invoice'";
        $result=mysqli_query($conn,$sql);
        if ($result==false) {
            echo "Error: ".mysqli_error($conn);
        }
        else if (mysqli_num_rows($result)==1) {
            $row=mysqli_fetch_assoc($result);
            $created=$row['date'];
            $receiver=$row['receiver'];
            $address=$row['address'];
            $status=$row['status'];
            $phone_no=$row['phone_no'];
            $total_amounts=$row['total'];

        }

        ?>
        <h4 style="margin-top: 40px;">Mã đơn hàng: <?php echo $id_invoice; ?> </h4>
        <h4>Ngày đặt hàng: <?php echo $created; ?> </h4>
        <h4>Người nhận: <?php echo $receiver; ?> </h4>
        <h4>Địa chỉ nhận: <?php echo $address; ?> </h4>
        <h4>Số điện thoại: <?php echo $phone_no; ?> </h4>
        <h4>Tình trạng: 
            <?php 
                $arrStatus=array(-1=>"Hủy",2=>"Thành công",1=>"Đã duyệt",0=>"Chưa duyệt");
                $status=$row['status'];
                echo $arrStatus[$status];

            ?>
            <?php 
                if ($status==0) {
                    echo "<a href='index.php?module=invoices&action=cancel&id_invoice=$id_invoice'>Hủy đơn hàng</a>";
                }

            ?>
        </h4>


        <h4>Danh sách các sản phẩm có trong đơn hàng</h4>
    <table id="table">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>

        </tr>
        <?php 
            $sql="SELECT products.name,products.id,products.price,invoice_details.amount FROM products INNER JOIN invoice_details ON products.id=invoice_details.id_products WHERE invoice_details.id_invoices='$id_invoice'" ;
            $result=mysqli_query($conn,$sql);
            if ($result==false) {
                echo "Error: ".mysqli_error($conn);
            }
            else if (mysqli_num_rows($result)==0) {
                echo "Không có sản phẩm";
            }
            else{
                $count =0;
                foreach($result as $row){
                    $count ++;
                    echo "<tr>";
                        echo "<td>".$count."</td>";
                        echo "<td>";
                            $id_product=$row['id'];
                            echo "<a href='index.php?module=product&action=product_details&id=$id_product'>".$row['name']."</a>";
                        echo "</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['amount']."</td>";

                    echo "</tr>";
                }
            }





        ?>
        <tr>
            <th colspan="3">Tổng tiền</th>
            <th><?php echo $total_amounts; ?> VNĐ</th>
        </tr>
    </table>

</div>

<?php require_once("layout/footer.php") ?>