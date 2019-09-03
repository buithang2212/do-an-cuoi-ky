<?php include '../sql/connect.php'; ?>
<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0 ;
$sql = "Select * from user Where user_id = $id LIMIT 1";
//

$res_user=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($res_user);


 ?>

      	<div class="col-md-10">
      			<form action="" method="POST" role="form">
      			<legend><h1><?php echo $res['user_name'];?></h1></legend>
      			<div class="form-group">
      				<table class="table table-hover">
      						<thead>
						 		<tr>
						 			<th>Tên </th>
						 			<th>Chi Tiết</th>
						 		</tr>
 							</thead>
							<tr>
								<th>ID:	</th>
								<td><?php echo $res['user_id'] ?></td>
							</tr>
							<tr>
								<th>Tên Người Dùng:</th>
								<td><?php echo $res['user_name'] ?></td>
							</tr>
							<tr>
								<th>Email:</th>
								<td><?php echo $res['Email'] ?></td>

							</tr>
							<tr>
								<th>Số Điện Thoại:</th>
								<td><?php echo $res['Phone'] ?></td>
							</tr>
							<tr>
								<th>Tư cách:</th>
								<td style="color: red;"><?php if($res['status']==1){echo"Người dùng";}else{echo"Admin";} ?></td>
							</tr>
							<tr>
								<th>Ngày Đăng Kí:</th>
								<td><?php echo $res['add_date'] ?></td>
							</tr>
								
					</table>
      				
      			</div>
      		
      			
      		<?php if($res['status']==2){ ?>
      			<a href="index.php?module=user&action=list" class="btn btn-danger"><span class="glyphicon glyphicon-backward" style="padding-right: 20px; color: black;"></span>Trở vê</a>
      				
				<?php }else{ ?>
					<a href="index.php?module=user&action=list" class="btn btn-danger"><span class="glyphicon glyphicon-backward" style="padding-right: 20px; color: black;"></span>Trở vê</a>
      				<a href="index.php?module=user&action=delete&id=<?php echo $id ?>" class="btn btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')">Xóa</a>
					<?php } ?>    

					</form>
				<div class="panel-body"> 
				
				</div>
			</div>


       
      
      	</div>
