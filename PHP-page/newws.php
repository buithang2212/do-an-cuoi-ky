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
					<title>Tin Tức</title>


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
									</div>
									<!-- carousel -->
								</div>
							</div>
						</div>
						<!-- search - menu - carousel -->
						

						<?php $sql_count = "Select * from news ";
						$res_count = mysqli_query($conn,$sql_count);
						$total = mysqli_num_rows($res_count);

						// Tính toán để lấy ra start và limit
						$get_page = isset($_GET['page']) ? $_GET['page'] : 1;
						$limit = 4 ;
						$start = ($get_page-1)*$limit;

						// Sử dụng hàm ceil để làm tròn số trang
						$page = ceil($total/$limit);

						$sql = "Select * from news where news_status=1 ";
						$news_res = mysqli_query($conn,$sql);
						?>
						<div class="sofa-content">
							<div class="col-md-3">
								<div class="row">						
									<?php include 'banchay.php' ?>
									<?php include 'camket.php' ?>
								</div>
							</div>


							<div class="col-md-9">
								<div class="bread-crumb">
									<ul class="list-inline">
										<li><span class="glyphicon glyphicon-home" style="margin-right: 5px;"></span><a href="index.php">Trang chủ</a></li>
										<span>/</span>
										<li>Tin Tức</li>
									</ul>

								</div>
								
								<div>

									<?php if ($news_res) {while ($news =mysqli_fetch_assoc($news_res)) { ?>


									<div >
										<div class="media"  style="margin:10px;">
											<a class="pull-left" href="view-news.php?id=<?php echo  $news['news_id']; ?>">
												<img class="media-object" src="../uploads/news/<?php echo $news['news_image']; ?>" alt="Image" style="height: 100px; width: 200px">
											</a>
											<div class="media-body">
											<h4 class="media-heading"><b><a href="view-news.php?id=<?php echo  $news['news_id']; ?>" style="color: black;"><?php echo $news['news_title']; ?></a></b> </h4>
												<p><?php echo $news['news_summary']; ?></p>
												<span style="margin-bottom:0px; color: red; ">Cập nhập :<?php echo $news['news_add_date']; ?></p></span>

											</div>
										</div>

										<hr>
									</div>
									<?php }} ?>
								</div>

										<!-- 			<div class="text-center">
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
							 -->





								<!-- sofa vang content -->								
							</div>
						</div>		
					</div>
					<?php include 'footer.php' ?>