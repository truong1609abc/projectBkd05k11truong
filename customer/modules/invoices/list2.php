<?php 
$title = "Lịch Sử Mua Hàng";
require_once("layout/header.php") ?>
<style type="text/css">
    .giohang table{
        width: 100%;
    }
    table,tr,td,th{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
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
        .invoice-list{
        margin-left: 25%;
        margin-top: 30px;
        }
        .invoice-list table,tr,th,td{
            border: 1px solid white; 
            width: 900px;
            color: white;
            font-size: 20px;

        }
</style>

<div class="invoice-list" >
    <table style="text-align: center;">
        <tr>
            <th>STT</th>
            <th>Mã Đơn Hàng</th>
            <th>Ngày Mua Hàng</th>
            <th>Tổng Tiền</th>
            <th>Tình Trạng</th>
        </tr>
    <?php 
        $id_customer=$_SESSION['customer']['id_customer'];
        $sql="SELECT * FROM invoices WHERE id_customer='$id_customer'";
        $result=mysqli_query($conn,$sql);
        if ($result==false) {
            echo "ERROR:".mysqli_error($conn);
        }
        else if(mysqli_num_rows($result)==0){
            echo "<tr><th colspan='5>Chưa có đơn hàng nào</th></tr>";
        }
        else{
            $count =0;
            foreach ($result as $row ) {
              $count++;
              echo "<tr>";
              echo "<th>".$count."</th>";
               echo "<th>".$row['id']."</th>";
              echo "<th>".$row['date']."</th>";
               echo "<th>".$row['total']."</th>";
               echo "<th>";
                $arrstatus=array(-1 => "Hủy",2 => "Thành Công",1=> "Đã Duyệt",0=>"Chưa Duyệt");
                $status=$row['status'];
                echo $arrstatus[$status];
               echo "</th>";
               echo "</tr>";
            }
        }

    ?>
    </table>
</div>




<?php require_once("layout/footer.php") ?>