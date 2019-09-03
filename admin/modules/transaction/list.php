<?php  include'../sql/connect.php' ?>
<?php  



// Lấy tổng số sản phẩm
$sql_count = "Select * from orders   ";
$res_count = mysqli_query($conn,$sql_count);
$total = mysqli_num_rows($res_count);

// Tính toán để lấy ra start và limit
$get_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$start = ($get_page-1)*$limit;

// Sử dụng hàm ceil để làm tròn số trang
$page = ceil($total/$limit);

$sql = " Select * from orders order by 	orderstatus, orderdate DESC ,orderid DESC Limit $start,$limit";


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
					<h3 class="panel-title" style="text-align: center;"><span class="glyphicon glyphicon-shopping-cart" style="padding-right: 20px;"></span>Danh sanh Đơn Hàng</h3>
				</div>
    		</div>
				

				
					<table class="table ">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên Chủ Đơn Hàng</th>
								<th>Trị giá</th>
								<th>Ngày đặt</th>
								<th>trạng thái</th>
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
									<td><?php echo $row['orderid']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['totalamount']; ?> d</td>
									<td><?php echo $row['orderdate']; ?></td>
									<td>
									<?php if ($row['orderstatus']==1) {?>

									<p style="color: red;">chưa phê duyệt</p>
									<?php } else {?>
									<p style="color:  #01559D">đã phê duyệt</p>
									<?php } ?>
									</td>
									<td style="text-align: center;">
		 								<a href="index.php?module=transaction&action=view&id=<?php echo $row['orderid'] ?>"" class="">| Chi Tiết |</a>
		 								
		 								

		 							</td>
								</tr>
					<?php	}
						}
					 ?>
							

						</tbody>
					</table>
				</div>
				
				<div class="text-center">
					<ul class="pagination">

					<?php if($get_page > 1 ) { ?>
						<li>
							<a href="index.php?module=transaction&action=list&page=<?php echo $get_page - 1; ?>">&laquo;</a>
						</li>

					<?php } ?>
					<?php for($i = 1; $i <= $page; $i ++) { ?>
						<li>
							<a href="index.php?module=transaction&action=list&page=<?php echo $i; ?>">
							<?php echo $i; ?>
							</a>
						</li>
					<?php } ?>
					<?php if($get_page < $page ) { ?>
						<li>
							<a href="index.php?module=transaction&action=list&page=<?php echo $get_page + 1; ?>">
							&raquo;
							</a>
						</li>
					<?php } ?>
					</ul>
				</div>
		
			<!-- panel-body -->
</div>