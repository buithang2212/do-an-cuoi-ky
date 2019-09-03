<?php ob_start(); ?>
<?php 	$module = isset($_GET['module']) ? $_GET['module'] : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'list'; ?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<meta name="description" content="">
			<meta name="author" content="">
			<link rel="icon" href="img/favicon.ico">
			<title>Trang chủ</title>


			<?php include 'header.php' ?>
			
			

			<div class="container" style="padding-bottom: 50px;">
				<div class="search-menu-carousel">					
					<div class="col-md-3" style="margin: 0px; padding: 0px;">
		<div class="col-md-12">
			<div class="row" style="text-align: left;">
				<div  style="text-align: center; border: solid gray 1px; border-radius: 0px; border-top: 0px;">
					<div class=" btn btn-link list-group-item category-item category-collapse" data-toggle="collapse" data-target="#demo">
						<a style=""><span class="glyphicon glyphicon-th-list" style="margin-right: 5px;"></span> DANH MỤC SẢN PHẨM</a>
					</div>
				</div>
				<?php 
					$sql_cat_menu="select * from category";
					$res_cat=mysqli_query($conn,$sql_cat_menu);


				 ?>
				<div >
					<div id="demo" class=" collapse collapse in">
						<ul class="list-group">
						<?php if ($res_cat){ while ($row_cat_menu=mysqli_fetch_assoc($res_cat)) { ?>
							<?php 
								$id=$row_cat_menu['cat_id'];
								$sql_num="select *from product where cat_id =$id";
								$res_num=mysqli_query($conn,$sql_num);
								$num_row=mysqli_num_rows($res_num);
3

							 ?>
							<div class="inline">
								<a href="category-product.php?cat=<?php echo $row_cat_menu['cat_id'] ?>" class="category-sofa"><li class="list-group-item category-item item-have-border-bottom"><?php echo $row_cat_menu['cat_name']; ?> <span class="badge"><?php echo $num_row; ?></span></li></a>
							
							</div>
							
						<?php }} ?>
						</ul>
					</div>
				</div>
			</div>
		</div>	
</div>						
					<!-- menu-left -->

					<div class="col-md-9">
						<div class="row">
							<?php include'search-bar.php' ?>
							<!-- search-bar -->
							<div style="padding-top: 1px; float: right;">
								<?php include'carousel.php' ?>
							</div>
							<!-- carousel -->
						</div>
					</div>
				</div>
				<!-- search - menu - carousel -->
				



				<div class="intro-content">

					<div class="intro-top">
						<h2>Công ty cổ phần nội thất 2htlc</h2>
						<div class="intro-img"></div>
					</div>


					<div class="intro-bottom">						
						<div class="col-md-3 thumbnail">
							<div class="box-img">
								<span></span>
							</div>

							<h4><a href="#">Cơ sở vật chất hiện đại</a></h4>

							<p>Không gian showroom rộng lớn, sang trọng, thuận tiện cho việc mua sắm...</p>

						</div>
						<div class="col-md-3 thumbnail">
							<div class="box-img">
								<span></span>
							</div>
							<h4><a href="#">Chất lượng vượt trội</a></h4>
							<p>Nguồn gốc sản phẩm rõ ràng, chất lượng uy tín, cập nhật xu hướng mới...</p>
						</div>
						<div class="col-md-3 thumbnail">
							<div class="box-img">
								<span></span>
							</div>
							<h4><a href="#">Nhân lực</a></h4>
							<p>Đội ngũ nhân viên chuyên nghiệp, tận tâm, có kinh nghiệm lâu năm...</p>
						</div>
						<div class="col-md-3 thumbnail">
							<div class="box-img">
								<span></span>
							</div>
							<h4><a href="#">Bảo hành sản phẩm</a></h4>
							<p>Cam kết bảo hành tại nhà trong thời gian sớm nhất. Bảo trì trọn đời...</p>
						</div>
					</div>
				</div>
				<!-- intro -->

				<?php include 'banner-sofa-goc.php'; ?>
				<!-- banner sofa góc -->
				<?php include 'banner-sofa-vang.php'; ?>
				<!-- banner sofa văng -->
				<?php include 'banner-bantra.php'; ?>
				<!-- banner bàn trà -->
			</div>			
		</div>
		<?php include 'footer.php' ?>