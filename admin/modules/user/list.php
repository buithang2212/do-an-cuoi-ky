<?php include'../sql/connect.php'; ?>
<?php 
//truy vấn vào bảng user

$sql="select * from user ORDER BY status DESC";
$res = mysqli_query($conn,$sql);
//
//đếm số khách hàng để phân trang
$total_user=mysqli_num_rows($res);
//lấy về số biến trang nếu ko có biến trang thì trang lấy về mặc định là 1
$get_page = isset($_GET['page']) ? $_GET['page'] : 1;
//1 trang để giới hạn là 10 tin
$limit=10;
//
$start=($get_page-1)*$limit;
//tính tổng số trang = (tổng số tin)/(số tin 1 trag)
$page = ceil($total_user/$limit);//dùng hàm ceil để chia làm tròn ví dụ 4.1=5
$sql = "Select * from user ORDER BY status DESC Limit $start,$limit";

if (!empty($_POST)) {
	// Lấy dữ liệu treeb form sreach
	$search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';

	// Trường hợp cả 2 không bị rỗng
	if ($search_name != '' && $Email !='') {
		$sql = "Select * from user WHERE user_name  LIKE '%$search_name%' ";
	}

	// Trường hợp Email rỗng
	if ($search_name != '' && $Email =='') {
		$sql = "Select * from user WHERE user_name LIKE '%$search_name%'";
	}

	// Trường hợp search_jey rỗng
	if ($search_name == '' && $Email !='') {
		$sql = "Select * from user WHERE Email like '%$Email'";
	}
}
// buoc 3: thuc hien truy van

$res = mysqli_query($conn,$sql);




 ?>


 <div class="col-md-10">
 	

		<div class="panel panel-default">			
			<div class="panel-heading">
				<h3 class="panel-title" style="text-align: center" ><span class="glyphicon glyphicon-user " style="padding-right: 20px; color: red;"></span>Danh Sách người Dùng</h3>
			</div>
			<div class="panel-body ">
				<form action="" method="POST" role="form" class="form-inline">
 				 <div>
	 				 	<div class="form-group">
	 				 <span class="glyphicon glyphicon-search"></span>
	 					<input type="text" name="search_name" value="" class="form-control" placeholder="Tìm Kiếm bằng tên">
	 				</div>
	 				<div class="form-group">
	 					<input type="text" name="Email" value="" class="form-control" placeholder="Tìm Kiếm bằng Email">
	 				</div>
	 				
	 				<button type="submit" class="btn ">Tìm Kiếm</button>

 				 </div>
 				</form>
				
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên Người Dùng</th>
							<th>Email</th>
							
							<th style="color: red ;text-align:center ">Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php if ($res) { 
						while ($user=mysqli_fetch_assoc($res)) { ?>
				
						<tr>
							<td><?php echo $user['user_id'] ;?></td>
						<?php if($user['status']==2 ){ ?>
							<td style="color: red;"><?php echo $user['user_name'];?> <img src="public/admin.jpg" alt="" style="height: 40px;border-radius: 25px;" > </td>
							<td><?php echo $user['Email'] ?></td>
							<td align="center"> 
								<a href="index.php?module=user&action=view&id=<?php echo $user['user_id']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-option-horizontal" style="padding-right: 15px;"  ></span>Chi Tiết</a>
								
								
							</td>
							<?php }else{ ?>
							<td><?php echo $user['user_name'];?></td>
							<td><?php echo $user['Email'] ?></td>

							<td align="center"> 
								<a href="index.php?module=user&action=view&id=<?php echo $user['user_id']; ?>" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-option-horizontal" style="padding-right: 15px;"  ></span>Chi Tiết</a>
								
								<a href="index.php?module=user&action=delete&id=<?php echo $user['user_id'] ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')"><span class="glyphicon glyphicon-trash" style="padding-right: 15px;" ></span>Xóa</a>
							</td

							<?php } ?>
							
							>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
			</div>
		</div>

 </div>