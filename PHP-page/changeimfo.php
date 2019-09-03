<?php include'header.php' ?>

<?php 
//var_dump($user)
$id =$user['user_id'];
//var_dump($id);
$sql_order=" select * from user where user_id = $id ";
$res_user=mysqli_query($conn,$sql_order);
$row_user=mysqli_fetch_assoc($res_user);
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
	<?php 
		if (isset($_POST['changeinfo'])) {
			$username=$_POST['username'];
			$Phone=$_POST['Phone'];
			$address=$_POST['address'];
			$sex=$_POST['sex'];
			
		
			$sql_change="update user set user_name='$username',Phone='$Phone',sex='$sex',address='$address'  where user_id=$id";
			$res_change=mysqli_query($conn,$sql_change);
		if ($res_change) {
		echo "<script language='javascript'>alert('Thay đổi thành công vui lòng đăng nhập lại');window.location.href='logout.php';</script>";		}}
	
	

	 ?>
			
<div class="col-md-9">
						<form action="" method="post" name="">
								<div class="panel panel-default">
							
							<div class="form-group">
							<label for="username"> Tên Người dùng
							
							<input id="username" class="form-control" type="text" name="username" required="" value="<?php echo $row_user['user_name'] ?>" ></label>	
							</div>	
							<div class="form-group">
							<label for="Phone"> Số điện thoại
							
							<input id="Phone" class="form-control" type="text" name="Phone" required="" pattern="[0-9]{10}" value="<?php echo $row_user['Phone'] ?>"></label>
							</div>
							<div class="form-group">
							<label for="address"> Địa chỉ
							
							<input id="address" class="form-control" type="text" required="" name="address" value="<?php echo $row_user['address'] ?>"></label>
							</div>
							<?php if($row_user['sex']==0){ ?>

							<div class="form-group">
							<label for="sex1"> Giớ tính
							
							<input id="sex1"  type="radio" name="sex" checked="checked" value="0"  > Nữ</label>
							<label for="sex2">
							
							<input id="sex2"  type="radio" name="sex"  value="1"  > Nam</label>
							</div>
							<?php }else{ ?>
							<div class="form-group">
							<label for="sex1"> Giớ tính
							
							<input id="sex1"  type="radio" name="sex"  value="0"  > Nữ</label>
							<label for="sex2">
							
							<input id="sex2"  type="radio" name="sex"  checked="checked" value="1"  > Nam</label>
							</div>
							<?php } ?>
							
										
								
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info" name="changeinfo">Lưu</button>
							</div>
						</form>
							</div>
							</div>


			<?php include'footer.php' ?>
									
 									 
   