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
					<?php include'menu-left.php' ?>						
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