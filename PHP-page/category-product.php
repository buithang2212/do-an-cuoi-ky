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
					<title>Danh mục</title>


					<?php include 'header.php' ?>
					
					

					<div class="container" style="padding-bottom: 50px;">
						<div class="search-menu-carousel">
									
							<?php include'menu-left.php' ?>						
							<!-- menu-left -->
							

							<div class="col-md-9">
								<div class="row">
									<?php include'search-bar.php' ?>
									<!-- search-bar -->
									
									<!-- carousel -->
								</div>
							</div>
						</div>
						<!-- search - menu - carousel -->
						<?php 
						$cat_id = isset($_GET['cat']) ? $_GET['cat'] : 0;

						$sql_pro_type="select * from product where cat_id =$cat_id ";
						$res_pro_type=mysqli_query($conn,$sql_pro_type);

						////truy vấn bang category
						$sql_name_type="select * from category where cat_id =$cat_id ";
						$res_name_type=mysqli_query($conn,$sql_name_type);
						$row_type= mysqli_fetch_assoc($res_name_type);
						 ?>


						<div class="sofa-content">
							<div class="col-md-3">
								<div class="row">						
									<?php include 'banchay.php' ?>
									<?php include 'contact.php' ?>
									<?php include 'camket.php' ?>
								</div>
							</div>


							<div class="col-md-9">
								<div class="bread-crumb">
									<ul class="list-inline">
										<li><span class="glyphicon glyphicon-home" style="margin-right: 5px;"></span><a href="index.php">Trang chủ</a></li>
										<span>/</span>
										<li><?php echo $row_type['cat_name'] ?></li>
									</ul>

								</div>
								<div class="banner2">
									<div class="cat-header">
										<h2>
											<span>
												<img src="../img/icon_sofas.png" alt="icon">
											</span>
											<a href=""><?php echo $row_type['cat_name'] ?></a>
										</h2>
									</div>
									<div class="sofa-list">									
										<div class="" style="padding-right: 0px;">
											<div class="col-md-12">
												<div class="row">
													<div>
														<div class="index-img">
															<img src="../img/amu-sofa-banner.jpg" alt="">
														</div>

														<div class="" style="margin-top: 20px;">
																
																	<?php if ($res_pro_type){ while ($row_pro_type = mysqli_fetch_assoc($res_pro_type)) { 
																	$goc=$row_pro_type['price'];
																	$sale=$row_pro_type['sale_price'];
																	$sale_rate = ceil(100-((100*$sale)/$goc));
																	//var_dump($row_pro_type);die();
																	?>
															
																<div class="col-md-4" style="margin-bottom: 20px;">

																	<div class=" sofa-list-product-details hvr-grow-shadow">
																		<div>
																			<div class="pro-img">
																				<a href="view.php?id=<?php echo $row_pro_type['pro_id']; ?>" title="Sofa Góc GA-410"><img class="img-responsive" src="../uploads/<?php echo $row_pro_type['image']; ?>"></a>
																				<span class="sale-icon"><?php echo '- '.$sale_rate; ?>%</span>
																			</div>
																			<div class="pro-details">
																				<a href="view.php?id=<?php echo $row_pro_type['pro_id']; ?>" style="color: gray;" ><?php echo $row_pro_type['pro_name'] ?></a>
																				<p>Giá KM: <?php echo number_format($row_pro_type['sale_price']).' VND'; ?></p>
																			</div>
																		</div>
																	</div>
																</div>
																<?php }} ?>

																



															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- sofa vang content -->								
							</div>
						</div>		
					</div>
					<?php include 'footer.php' ?>