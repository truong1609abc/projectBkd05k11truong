<?php 
	$keyword="";
	$sql="SELECT id,name,price,status,image FROM products";
			if (isset($_GET['btn'])) {
		        $keyword=$_GET['keyword'];
		        $sql="SELECT id,name,price,status,image FROM products WHERE  name LIKE '%$keyword%'";
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
 ?>
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
<div class="list_1">
    <form style="margin-top:10px;" method="GET">
        <input type="hidden" name="module" value="product">
        <input type="hidden" name="action" value="list">
        <input type="text" style="width:100px;border-radius:5px;outline: none;"  name="keyword" placeholder="Bạn cần tìm gì?" value="<?php if(isset($keyword)) echo $keyword; ?>">
        <button type="submit" style="width: 100px;border-radius:5px;outline: none;background-color: #0066994D;color:white;" name="btn">Tìm kiếm</button>
    </form>
</div>
	<table>
		<tr>
			<th>ID</th>
			<th>Sản phẩm</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
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
	<button style="margin-left: 40%">
  <a href="index.php?module=product&action=list&keyword= <?php echo $keyword; ?>&page=<?php if($page > 1) {echo ($page-1);} else echo $page; ?>">Trang Trước</a>
  		</button>
    <b style="color: black ;font-size: 20px;"><?php echo $page; ?></b>

    <button>
    <a href="index.php?module=product&action=list&keyword=<?php echo $keyword; ?>&page=<?php if($page < $tong_so_trang) {echo ($page+1);} else echo $page; ?>">Trang Tiếp Theo</a>	</button>
</div>



<?php require_once("layout/footer.php") ?>