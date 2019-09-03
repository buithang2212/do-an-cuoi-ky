
<?php include'../sql/connect.php'; ?>
<?php 


//
$id = isset($_GET['id']) ? $_GET['id'] : 0 ;
$sql = "Select * from product Where pro_id = $id LIMIT 1";
//
$sql_pro ="select * from product";
$res =mysqli_query($conn, $sql);
$row =mysqli_fetch_assoc($res);

$a=$row['cat_id'];//lấy về cat-id cua bảng product để truy vấn vào bảng categogry
$b=$row['status'];//lấy về status-id qua bang product
//
$sql_cate ="select cat_id,cat_name from category Where cat_id = $a";
$res_cat =mysqli_query($conn, $sql_cate);
$row_cat =mysqli_fetch_assoc($res_cat);

//
$sql_tus ="select * from status Where tus_id = $b";
$res_tus =mysqli_query($conn, $sql_tus);
$row_tus =mysqli_fetch_assoc($res_tus);
//


 ?>

 <div class="col-md-10">
 	<div class="">
		<form action=" " method="POST" role="form">
			<legend><?php 	echo $row['pro_name']; ?></legend>
		
			 <table class="table table-hover">
 	<thead>
 		<tr>
 			<th>Tên </th>
 			<th>Chi Tiết</th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<th>ID</th>
 			<td><?php echo $row['pro_id'] ?></td>
 		</tr>
 		<tr>
 			<th>Tên Sản Phẩm</th>
 			<td><?php echo $row['pro_name'] ?></td>
 		</tr>
 		<tr>
 			<th>Loại Sản Phẩm</th>
 			
 			
 				<td > <?php   
 							echo $row_cat['cat_name'];

			 				 ?>
 			</td>
 		</tr>
 		<tr>
 			<th>Giá</th>
 			<td><?php echo $row['price']; ?></td>
 		</tr>
 		<tr>
 			<th>Giá Khuyến Mại</th>
 			<td><?php echo $row['sale_price'] ?></td>
 		</tr>
 		<tr>
 			<th>Ảnh</th>
 			<td><?php echo $row['image'] ?> <img src="../uploads/<?php echo $row['image']; ?>" alt="" style="height: 150px"></td>
 		</tr>
 		<tr>
 			<th>Mô tả</th>
 			<td><?php echo $row['pro_content'] ?></td>
 		</tr>
 		<tr>
 			<th>Trạng Thái</th>
 			<td><?php echo $row_tus['tus_name'] ?> </td>
 		</tr>
 		<tr>
 			<th>Ngày Thêm</th>
 			<td><?php echo $row['add_date'] ?></td>
 		</tr>
 		
 	</tbody>
 </table>
		
			<div>	
					<a href="index.php?module=product&action=edit&id=<?php echo $id; ?>" class="btn  btn-warning">sửa</a>
					<a href="index.php?module=product&action=delete&id=<?php echo $id ?>" class="btn btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')">Xóa</a>

			</div>
				
		</form>
 		
 	
 </div>
 </div>