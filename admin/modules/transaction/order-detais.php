<?php 

$id=isset($_GET['id']) ? $_GET['id']:0;
//echo $id;
	
	$sql="select * from product,orders,orderdetails where orders.orderid = orderdetails.orderid and orderdetails.productid = product.pro_id and orders.orderid = $id ";
	$res=mysqli_query($conn,$sql);
	//var_dump($res);


?>
<div class="col-md-12">
	
    		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align: center;"><span class="" style="padding-right: 20px;"></span>Đơn hàng số <?php echo $id; ?></h3>
				</div>
  	  		</div>
				
					<table class="table  ">
						<thead>
							<tr>
								<th>ID sản phẩm</th>
								<th>Tên Sản Phẩm</th>
								<th>Ảnh</th>
								<th>Giá tại tời điểm</th>
								<th>Ngày đặt</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					if ($res) {
							while($row = mysqli_fetch_assoc($res)) {
								// echo '<pre>';
								// print_r($row['pro_name']);
								// echo '</pre>';
					?>
								<tr>
									<td><?php echo $row['pro_id']; ?></td>
									<td><?php echo $row['pro_name']; ?></td>
									<td><img src="../uploads/<?php echo $row['image']; ?>" alt="" style="height: 50px"></td>
									<td><?php echo $row['amount_order']; ?> d</td>
									<td><?php echo $row['orderdate']; ?></td>
									
								</tr>
					<?php	}
						}
					 ?>
							

</div>


