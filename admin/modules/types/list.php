<?php 
$title = "Quản lí loại";
require_once("layout/header.php") ?>
<style type="text/css">
	.list-types{
		padding: 16px;
	}
	.list-types table{
		width: 100%;
		text-align: center;
		font-size: larger;
	}
	.list-types table,td,tr,th{
		border: 1px solid black;
		border-collapse: collapse;
	}
	.button1{
			background-color: white; 
  			color: black; 
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
<script type="text/javascript">
	function confirmDelete(){
		return confirm("Bạn có muốn xóa ?")
	}
</script>
<div class="list-types">
	<button class="button1"><a class="a1" href="index.php?module=types&action=insert"><i class="fas fa-plus-circle"></i>Thêm loại</a></button><br><br>
	<table>
		<tr>
			<th>ID</th>
			<th>Tên hãng</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
			$sql="SELECT *FROM types";
			$result=mysqli_query($conn,$sql);
			if ($result==false) {
				echo "Error: ".mysqli_error($conn);
			}
			else if (mysqli_num_rows($result)==0) {
				echo "<tr><th colspan='4'>Danh sách rỗng</th></tr>";
			}
			else{
				foreach($result as $row){
					echo "<tr>";
						echo "<td>".$row['id_type']."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>";
							$id_type=$row['id_type'];
							echo "<a href='index.php?module=types&action=edit&id_type=$id_type'>Sửa</a>";
						echo "</td>";
						echo "<td>";
							$id_type=$row['id_type'];
							echo "<a onclick='return confirmDelete()' href='index.php?module=types&action=delete&id_type=$id_type'>Xóa</a>";
						echo "</td>";
					echo "</tr>";
				}
			}

		 ?>
	</table>
</div>



<?php require_once("layout/footer.php") ?>