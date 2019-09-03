<?php  include'../sql/connect.php' ?>
<?php  


$cat_sql = "Select * from category";
$cat_res = mysqli_query($conn,$cat_sql);

// Lấy tổng số sản phẩm
$sql_count = "Select * from product";
$res_count = mysqli_query($conn,$sql_count);
$total = mysqli_num_rows($res_count);

// Tính toán để lấy ra start và limit
$get_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$start = ($get_page-1)*$limit;

// Sử dụng hàm ceil để làm tròn số trang
$page = ceil($total/$limit);

$sql = "Select * from product Limit $start,$limit";


// if (isset($_POST['search_key'])) {
// 	$search_key = $_POST['search_key'];
// 	$sql = "Select * from product WHERE pro_name LIKE '%$search_key%'";
// }

// if (isset($_POST['cat_id'])) {
// 	$cat_id = $_POST['cat_id'];
// 	$sql = "Select * from product WHERE cat_id = $cat_id";
// }

// kiem tra khi nhan nut search
if (!empty($_POST)) {
	// Lấy dữ liệu treeb form sreach
	$search_key = isset($_POST['search_key']) ? $_POST['search_key'] : '';
	$cat_id = isset($_POST['cat_id']) ? $_POST['cat_id'] : '';

	// Trường hợp cả 2 không bị rỗng
	if ($search_key != '' && $cat_id !='') {
		$sql = "Select * from product WHERE pro_name LIKE '%$search_key%' AND cat_id = $cat_id";
	}

	// Trường hợp cat_id rỗng
	if ($search_key != '' && $cat_id =='') {
		$sql = "Select * from product WHERE pro_name LIKE '%$search_key%'";
	}

	// Trường hợp search_jey rỗng
	if ($search_key == '' && $cat_id !='') {
		$sql = "Select * from product WHERE cat_id = $cat_id";
	}
}
// buoc 3: thuc hien truy van

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
					<h3 class="panel-title" style="text-align: center;"><span class="glyphicon glyphicon-shopping-cart" style="padding-right: 20px;"></span>Danh sanh sản phẩm</h3>
				</div>
    		</div>
				<div class="panel-body">
					<div class="form-group">
 					<a class="btn btn-success" href="index.php?module=product&action=add">Thêm sản phẩm </a>
 				</div>


					<form action="" method="POST" class="form-inline" role="form">
						
						<div class="form-group">
							<input type="text" class="form-control" name="search_key" placeholder="Từ khóa tìm kiếm.." >
						</div>
						<div class="form-group">
							<select name="cat_id" id="input" class="form-control" >
								<option value="">chọn danh mục</option>
						<?php if ($res) { while($cat = mysqli_fetch_assoc($cat_res)) { ?>
								<option value="<?php echo $cat['cat_id'];  ?>"><?php echo $cat['cat_name'];  ?></option>
							<?php } 
							} 
						?>
						

							</select>
						</div>											
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Tìm Kiếm</button>

					</form>
					<table class="table ">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên Sản Phẩm</th>
								<th>Ảnh</th>
								<th>Giá</th>
								<th>Giá KM</th>
								<th>Ngày thêm</th>
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
									<td><?php echo $row['pro_id']; ?></td>
									<td><?php echo $row['pro_name']; ?></td>
									<td><img src="../uploads/<?php echo $row['image']; ?>" alt="" style="height: 50px"></td>
									<td><?php echo $row['price']; ?> d</td>
									<td><?php echo $row['sale_price'] ?></td>
									<td><?php echo $row['add_date']; ?></td>
									<td style="text-align: center;">
		 								<a href="index.php?module=product&action=view&id=<?php echo $row['pro_id'] ?>"" class="">| Chi Tiết |</a>
		 								<a href="index.php?module=product&action=edit&id=<?php echo $row['pro_id'] ?>" class="">sửa |</a>
		 								<a href="index.php?module=product&action=delete&id=<?php echo $row['pro_id'] ?>" class=""  onclick="return confirm('Ban co chac muon xoa ?')">Xóa |</a>

		 							</td>
								</tr>
					<?php	}
						}
					 ?>
							

						</tbody>
					</table>
					<div>(<?php echo $limit; ?>/<?php echo $total; ?>)tổng số sản phẩm</div>
				</div>
				
				<div class="text-center">
					<ul class="pagination">

					<?php if($get_page > 1 ) { ?>
						<li>
							<a href="index.php?module=product&action=list&page=<?php echo $get_page - 1; ?>">&laquo;</a>
						</li>

					<?php } ?>
					<?php for($i = 1; $i <= $page; $i ++) { ?>
						<li>
							<a href="index.php?module=product&action=list&page=<?php echo $i; ?>">
							<?php echo $i; ?>
							</a>
						</li>
					<?php } ?>
					<?php if($get_page < $page ) { ?>
						<li>
							<a href="index.php?module=product&action=list&page=<?php echo $get_page + 1; ?>">
							&raquo;
							</a>
						</li>
					<?php } ?>
					</ul>
				</div>
		
			<!-- panel-body -->

    	</div>
