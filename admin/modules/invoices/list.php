<?php 
	$title="Danh Sách Hóa Đơn" ;
	require_once ("layout/header.php");
 ?>
<?php 
	$sql="SELECT * FROM invoices ORDER BY date DESC";
	$result=mysqli_query($conn,$sql);
	if ($result==false) {
		die("ERROR:".mysqli_error($conn));
	}
 ?>
 <style type="text/css">
 	.invoices tr,th,td{
 		border: 1px solid black;
 		width: 100px;
 		height: 10px;
 	}
 	.invoices table{
 		border-collapse: collapse;
 		margin: auto;
 		margin-top: 50px;
 	}
 </style>
 <div class="invoices" style="text-align: center;" >
 	<table>
 		<tr>
 			<th>Mã Hóa Đơn</th>
 			<th>Ngày Đặt</th>
 			<th>Người Nhận</th>
 			<th>SĐT</th>
 			<th>Địa Chỉ</th>
 			<th>Tổng Tiền</th>
 			<th>Tình Trạng</th>
 		</tr>
 	<?php 
 		if (mysqli_num_rows($result)==0) {
 			echo "<h2>Không Có Hóa Đơn</h2>";
 		}
 		else{
 			foreach ($result as $row) {
 				echo "<tr>";
 					$id_invoices=$row['id'];
 					echo "<td>";
 						echo "<a href='index.php?module=invoices&action=details&id_invoice=$id_invoices'>$id_invoices</a>";
 					echo"</td>";
 					echo "<td>".$row['date']."</td>";
 					echo "<td>".$row['receiver']."</td>";
 					echo "<td>".$row['phone_no']."</td>";
 					echo "<td>".$row['address']."</td>";
 					echo "<td>".$row['total']."VND</td>";
 					echo "<td>";
 						$arrstatus=array(-1 => "Hủy",2 => "Thành Công",1=> "Đã Duyệt",0=>"Chưa Duyệt");
                			$status=$row['status'];
                		echo $arrstatus[$status];
 					echo "</td>";

 				echo "</tr>";
 			}
 		}

 	 ?>
 	 	
 	 </table>
 </div>
 <?php 
	require_once ("layout/footer.php");
 ?>