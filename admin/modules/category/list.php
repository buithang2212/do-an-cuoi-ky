<?php  include'../sql/connect.php' ?>
<?php  


$sql = "Select * from category";
$cat_res = mysqli_query($conn,$sql);


$res = mysqli_query($conn,$sql);

// debog
// neu cau truy van dung se tra ve dong du lieu
// neu sai tra ve false
// echo '<pre>';
// var_dump($res);
// echo '</pre>';
//buoc 4: duyet du lieu su dung vong lap while, foreach


?>
<div class="col-md-10">
	
    		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align: center;"><span class="glyphicon glyphicon-align-justify" style="padding-right: 20px;"></span>Danh Sách Danh Mục</h3>
				</div>
    		</div>
				<div class="panel-body">
					<div class="form-group">
 					<a class="btn btn-success" href="index.php?module=category&action=add">Thêm Danh Mục </a>
 				</div>


					<table class="table ">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên Danh Mục</th>
								<th>Ảnh Đại diện</th>
								<th style="color: red ;text-align: center;">Tùy Chỉnh</th>
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
									<td><?php echo $row['cat_id']; ?></td>
									<td><?php echo $row['cat_name']; ?></td>
									<td><img src="../img/<?php echo $row['cat_image']; ?>" alt="" style="height: 50px"></td>
									<td style="text-align: center;">
		 								
		 								<a href="index.php?module=category&action=edit&id=<?php echo $row['cat_id'] ?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit" style="padding-right: 20px;" ></span>sửa</a>
		 								<a href="index.php?module=category&action=delete&id=<?php echo $row['cat_id'] ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')"><span class="glyphicon glyphicon-trash" style="padding-right: 20px;" ></span>Xóa</a>

		 							</td>
								</tr>
					<?php	}
						}
					 ?>
							

						</tbody>
					</table>
				</div>
</div>
				
	
		
			<!-- panel-body -->

