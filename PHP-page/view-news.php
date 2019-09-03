
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


		<?php 

		$id =isset($_GET['id']) ? $_GET['id'] :0;
		$sql="select *from news where news_id= $id";
		$res_new=mysqli_query($conn,$sql);
		$row_news=mysqli_fetch_assoc($res_new);

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

				<div>
				 	<h2><?php echo $row_news['news_title']; ?></h2>
				 </div>
				<div >
					<h4><b><?php echo $row_news['news_summary']; ?></b></h4>
				</div>	
				<div>
					<?php echo $row_news['news_content']; ?>
				</div>


				
				</div>
				<div class="fb-comments" data-href="http://localhost:8080/hoang/hoang/PHP-page/index.php" data-numposts="5"></div>







				<!-- sofa vang content -->								
			</div>
		</div>		
	</div>
	<?php include 'footer.php' ?>