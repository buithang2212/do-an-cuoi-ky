<?php include'header.php' ?>

<?php 
//var_dump($user)
$id =$user['user_id'];
//var_dump($id);
$sql_order=" select * from user where userid = $id ";
$res_user=mysqli_query($conn,$sql_order);
//var_dump($row_order = mysqli_fetch_assoc($res_order));

 ?>

<div class="container" style="padding: 50px">
<div class="col-md-3">
		<div class="list-group">
  <a href="#" class="list-group-item active">
    Thông tin cá nhân
  </a>
  <a href="#modal-changepass" data-toggle="modal" class="list-group-item">Đổi mật khẩu</a>
  <a href="changeimfo.php" class="list-group-item">Thay đổi thông tin</a>
  <a href="view_order.php" class="list-group-item">quản lí đơn hàng</a>
  <a href="logout.php" class="list-group-item">Đăng xuất </a>
</div>
	</div>
			
<div class="col-md-9">
							<div class="panel panel-default">
							<div class="panel-heading"></div>
										<?php 
								if ($res_user) {
							while($row_user = mysqli_fetch_assoc($res_user)) { ?>
							
										<div class="row">
											<div class="col-md-12" style="padding: 20px;background-color: "> 
										<div class="col-md-3">Tên Người dùng: <?php echo $row_user['user_name']; ?></div>
										<div class="col-md-3">Điện thoại <?php echo $row_user['Phone']; ?></div>
										<div class="col-md-4"> tổng tiển: <?php echo $row_user['totalamount']; ?></div>
										<?php if($row_user['sex']==0){ ?>
										<input type="radio" name="sex" value="0"> nữ
										<?php }else{ ?>	
										<input type="radio" name="sex" value="1"> nam
										<?php } ?>
										<div><hr></div>
										</div> 
										</div>
									<!-- 	<?php 
										$id_detail=$row_order['orderid'];
										$sql_detai=" select * from product,orders,orderdetails where orders.orderid = orderdetails.orderid and orderdetails.productid = product.pro_id and orders.orderid = $id_detail ";
										$res_detail=mysqli_query($conn,$sql_detai);


										if ($res_detail) {while ( $row_detai=mysqli_fetch_assoc($res_detail)) { ?>
										<div class="col-md-12" style="padding: 20px">

										
										 <div class="col-md-6"><div><img style="height: 50px" src="../uploads/<?php echo $row_detai['image'] ?> " alt="" ></div></div>
										 <div class="col-md-6" style="font-size: 12px">
										 	<div>Mã SP: <?php echo $row_detai['pro_id']; ?></div>
										 	<div>Tên SP:<?php echo $row_detai['pro_name']; ?></div>
										 	<div>Giá Tại lúc mua: <?php echo $row_detai['amount_order']; ?></div>

										 </div>
											
										</div> 
										<?php }} ?>
									 -->
									<?php } }?>
							</div>
							</div>
							</div>


			<?php include'footer.php' ?>
									
 									 
   