<?php 
$title = "Danh sách sản phẩm";
 
require_once("layout/header.php") ?>
<style type="text/css">
	.list-products{
		padding: 16px;
	}
	.list-products table{
		width: 100%;
		text-align: center;
		font-size: larger;
	}
	.list-products table,td,tr,th{
		border: 1px solid black;
		border-collapse: collapse;
	}
	.button1{
			background-color: white; 
  			color: red; 
  			border: 2px solid crimson;
  			padding: 5px 5px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 10px;
  			margin: 1px 1px;
  			-webkit-transition-duration: 0.4s; 
 			transition-duration: 0.4s;
  			cursor: pointer;
  			border-radius: 4px;
		}
	.button1:hover {
  			background-color: red;
  			color: white;
  	}
</style>


<div class="list-products">
	<button class="button1"><a class="a1" href="index.php?module=product&action=insert"><i class="fas fa-plus-circle"></i>Thêm Sản Phẩm</a></button><br><br>
	<table>
		<tr>
			<th>ID</th>
			<th>Sản phẩm</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
			$sql="SELECT id,name,price,status,image FROM products";
			$result=mysqli_query($conn,$sql);
			if ($result==false) {
				echo "Error: ".mysqli_error($conn);
			}
			else if(mysqli_num_rows($result)==0){
				echo "<tr><th colspan='6'>Danh sách rỗng</th></tr>";
			}
			else{
				foreach($result as $row){
					echo "<tr>";
						$id_product=$row['id'];
						echo "<td>".$id_product."</td>";
						echo "<td>";
							echo "<b>".$row['name']."</b><br>";
							$url=$row['image'];
							echo "<img src='$url' width='100px'>";
						echo "</td>";
						echo "<td>".$row['price']."</td>";
						echo "<td>";
							
							
				 				$status=$row['status'];
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

				 			
						echo "</td>";
						echo "<td>";
							echo "<a href='index.php?module=product&action=edit&id=$id_product'>Sửa</a>";
						echo "</td>";
						echo "<td>";
							echo "<a href='index.php?module=product&action=delete&id=$id_product'>Xóa</a>";
						echo "</td>";
					echo "</tr>";
				}
			}

		 ?>



	</table>
</div>



<?php require_once("layout/footer.php") ?>