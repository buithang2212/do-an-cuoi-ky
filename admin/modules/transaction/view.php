<?php include'../sql/connect.php'; ?>
<?php 


//
$id = isset($_GET['id']) ? $_GET['id'] : 0 ;
$sql = "Select * from orders Where orderid = $id LIMIT 1";
//

$res =mysqli_query($conn, $sql);
$row =mysqli_fetch_assoc($res);
//var_dump($row);

 ?>

 <div class="col-md-10">
 	<div class="">
		<form action=" " method="POST" role="form">
			<legend><?php 	echo $row['username']; ?></legend>
		
			 <table class="table table-hover">
 	<thead>
 		<tr>
 			<th>Tên </th>
 			<th>Chi Tiết</th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<th>ID đơn hàng</th>
 			<td><?php echo $row['orderid'] ?></td>
 		</tr>
 		<tr>
 			<th>Tên Chủ đơn hàng</th>
 			<td><?php echo $row['username'] ?></td>
 		</tr>
 		<tr>
 			<th>Id khác hàng</th>
 			
 			
 			<td > <?php echo $row['userid'] ?>
 			</td>
 		</tr>
 		<tr>
 			<th>Email</th>
 			<td><?php echo $row['useremail']; ?></td>
 		</tr>
 		<tr>
 			<th>Số điện thoại</th>
 			<td><?php echo $row['phone']; ?></td>
 		</tr>
 		<tr>
 			<th>Địa chỉ</th>
 			<td><?php echo $row['address']; ?></td>
 		</tr>
 		<tr>
 			<th>Giá Trị đơn hàng</th>
 			<td><?php echo $row['totalamount']; ?></td>
 		</tr>
 		<tr>
 			<th>Phương thức Thanh toán </th>
 			<td><?php switch ($row['paymentmethod']) {
 				case 1:
 					echo "Thanh toán trực tiếp";
 					break;
 				case 2:
 					echo "Thanh toán tại nơi giao hàng";
 					break;
 				case 3:
 					echo "Thanh toán bằng chuyển khoản";;
 					break;
 				case 4:
 					echo "Thanh toán trực tuyến bằng thẻ quốc tế Visa";
 					break;
 				

 				
 			} 
 			 ?></td>
 		</tr>
 		<tr>
 			<th>Phương thức vận chuyển</th>
 			<td><?php  switch ($row['transportstatus']) {
 				case 1:
 					echo "Vận chuyển tính phí theo thỏa thuận";
 					break;
 				case 2:
 					echo "Miễn phí trong nội thành Hà Nội";
 					break;
 				case 3:
 					echo "Miễn phí trong 35 KM";;
 					break;}?></td>
 		</tr>
 		<tr>
 			<th>Trạng Thái</th>
 			<td>
 			 <?php if ($row['orderstatus']==1){?>
 			
 			<p style="color: red;">chưa phê duyệt</p>
 			
 		
 			<?php } else {	?>
				<p style="color: #01559D">	Đã Phê Duyệt</p>
			
			<?php } ?>
			</td>
 			
 		</tr>
 		<tr>
 			<th>Lời nhắn</th>
 			<td><?php echo $row['message']; ?></td>
 		</tr>
 		
 	</tbody>
 </table>

 <?php
 	//$id_detail=row['orderid'];
 	//var_dump($id);
 	$sql_detail="select * from product,orders,orderdetails where orders.orderid = orderdetails.orderid and orderdetails.productid = product.pro_id and orders.orderid = $id";
	$res_detail=mysqli_query($conn,$sql_detail);
	//var_dump($res);


?>

				
					<table class="table  ">
						<thead>
							<tr>
								<th>ID sản phẩm</th>
								<th>Tên Sản Phẩm</th>
								<th>số lượng</th>
								<th>Ảnh</th>
								<th>Giá tại tời điểm</th>
								<th>Ngày đặt</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					if ($res_detail) {
							while($row_detail = mysqli_fetch_assoc($res_detail)) {
								// echo '<pre>';
								// print_r($row['pro_name']);
								// echo '</pre>';
					?>
								<tr>
									<td><?php echo $row_detail['pro_id']; ?></td>
									<td><?php echo $row_detail['pro_name']; ?></td>
									<td><?php echo $row_detail['quantity'] ?></td>
									<td><img src="../uploads/<?php echo $row_detail['image']; ?>" alt="" style="height: 50px"></td>
									<td><?php echo $row_detail['amount_order']; ?> d</td>
									<td><?php echo $row_detail['orderdate']; ?></td>
									
								</tr>
					<?php	}
						}
					 ?>
							
					</tbody></table>


		
			<div>	 


			<?php if ($row['orderstatus']==1){?>
					
					<a href="index.php?module=transaction&action=confirm&id=<?php echo $row['orderid'] ?>" class="btn btn-info"  onclick="return confirm('Bạn Có Muốn Phê Duyệt')">Phê duyệt </a>
					<a href="index.php?module=transaction&action=delete&id=<?php echo $id ?>" class="btn btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')">Xóa</a>
					<a href="index.php?module=transaction&action=list" style="float: right;" class="btn btn-info">Quay lại</a>
					
			<?php } else {	?>
					<a href="index.php?module=transaction&action=delete&id=<?php echo $id ?>" class="btn btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')">Xóa</a>
					<a href="index.php?module=transaction&action=list" style="float: right;" class="btn btn-info">Quay lại</a>
					
			<?php } ?>

			</div>
				
		</form>
 		
 	
 </div>
 </div>