<?php  include'../sql/connect.php' ?>
<?php  


// Lấy tổng số sản phẩm
$sql_count = "Select * from news";
$res_count = mysqli_query($conn,$sql_count);
$total = mysqli_num_rows($res_count);

// Tính toán để lấy ra start và limit
$get_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$start = ($get_page-1)*$limit;

// Sử dụng hàm ceil để làm tròn số trang
$page = ceil($total/$limit);

$sql = "Select * from news order by news_add_date DESC,news_id DESC Limit $start,$limit 	";


 if (isset($_POST['search_key'])) {
 	$search_key = $_POST['search_key'];
 	$sql = "Select * from product WHERE pro_name LIKE '%$search_key%'";
 }

 if (isset($_POST['cat_id'])) {
 	$cat_id = $_POST['cat_id'];
 	$sql = "Select * from product WHERE cat_id = $cat_id";
 }

// kiem tra khi nhan nut search
if (!empty($_POST)) {
	// Lấy dữ liệu treeb form sreach
	$search_key = isset($_POST['search_key']) ? $_POST['search_key'] : '';
	

		$sql = "Select * from news WHERE news_title LIKE '%$search_key%' ";

	

	
}
// buoc 3: thuc hien truy van

$news_res = mysqli_query($conn,$sql);

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
				<div class="panel-heading" style="">
					<h1 class="panel-title" style="text-align: center;"><span class="glyphicon glyphicon-tasks" style="padding-right: 20px;"></span>Danh sanh Tin</h1>
				</div>
    		</div>
				<div class="panel-body">
					<div class="form-group">
 					<a class="btn btn-success" href="index.php?module=news&action=add"><span class="glyphicon glyphicon-plus"></span>Thêm Tin mới </a>
 				</div>


					<form action="" method="POST" class="form-inline" role="form">
						
						<div class="form-group">
							<input type="text" class="form-control" name="search_key" placeholder="Từ khóa tìm kiếm.." >
						</div>
						
																
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Tìm Kiếm</button>

					</form>
					<?php if ($news_res) {while ($news =mysqli_fetch_assoc($news_res)) { ?>
						
				
					<div >
						<div class="media"  style="margin:10px;">
						<a class="pull-left" href="#">
							<img class="media-object" src="../uploads/news/<?php echo $news['news_image']; ?>" alt="Image" style="height: 100px; width: 200px">
						</a>
						<div class="media-body">
							<h4 class="media-heading">ID <?php echo $news['news_id'] ?> : <?php echo $news['news_title']; ?></h4>
							<p><?php echo $news['news_summary']; ?></p>
							<span style="margin-bottom:0px; color: red; ">Cập nhập :<?php echo $news['news_add_date']; ?></p></span>

						</div>
					</div>
					<div><h4>
							<?php if($news['news_status']==0){ ?>
								<a href="index.php?module=news&action=view&id=<?php echo $news['news_id'] ?>">| Chi tiết</a>
								<a href="index.php?module=news&action=edit&id=<?php echo $news['news_id'] ?>">| Sửa |</a>
								<a href="index.php?module=news&action=delete&id=<?php echo $news['news_id'] ?>" onclick="return confirm('Ban co chac muon xoa ?')"> Xóa |	</a>
								<p style="color: red;" class=""><span class="glyphicon glyphicon-lock"></span>Chưa công khai </p>
							<?php }else{ ?>
								<a href="index.php?module=news&action=view&id=<?php echo $news['news_id'] ?>">| Chi tiết</a>
								<a href="index.php?module=news&action=edit&id=<?php echo $news['news_id'] ?>">| Sửa |</a>
								<a href="index.php?module=news&action=delete&id=<?php echo $news['news_id'] ?>" onclick="return confirm('Ban co chac muon xoa ?')"> Xóa |	</a>
								<p style="color: green;"><span class="glyphicon glyphicon-globe"></span>công khai </p>
								<?php } ?>
					</h4></div>
					<hr>
					</div>
					<?php }} ?>
					<div><h4 style="color: red; float: right;">(<?php echo $limit; ?>/<?php echo$total ?>) Tổng Số Tin</h4></div>
				</div>

				
				<div class="text-center">
					<ul class="pagination">

					<?php if($get_page > 1 ) { ?>
						<li>
							<a href="index.php?module=news&action=list&page=<?php echo $get_page - 1; ?>">&laquo;</a>
						</li>

					<?php } ?>
					<?php for($i = 1; $i <= $page; $i ++) { ?>
						<li>
							<a href="index.php?module=news&action=list&page=<?php echo $i; ?>">
							<?php echo $i; ?>
							</a>
						</li>
					<?php } ?>
					<?php if($get_page < $page ) { ?>
						<li>
							<a href="index.php?module=news&action=list&page=<?php echo $get_page + 1; ?>">
							&raquo;
							</a>
						</li>
					<?php } ?>
					</ul>
				</div>
		
</div>
			<!-- panel-body -->

