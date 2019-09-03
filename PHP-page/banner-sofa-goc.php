<div class="banner1">
	<div class="cat-header">
		<h2>
			<span>
				<img src="../img/icon_sofas.png" alt="icon">
			</span>
			<a href="category-product.php?cat=1">Ghế sofa góc</a>
		</h2>
	</div>
	<div>
		<div class="contact-online">
			<div class="col-md-3">
				<div class="row">	
					<?php 	
				
					
					$sql_cat = "Select * from product where cat_id=1 ORDER BY add_date DESC limit 5  ";
					$res_cat = mysqli_query($conn,$sql_cat);
					?>
					<div class="panel panel-info banchay">
						<div class="banchay-heading">
							<h3 class="panel-title banchay_title">Sản phẩm mới</h3>
						</div>
						<?php if ($res_cat){ while ($row_cat1 = mysqli_fetch_assoc($res_cat)) { ?>
						

						<div class="panel-body">
							<div class="row">
								<ul class="banchay-content hvr-grow-shadow">
									<li>
										<div class="banchay-details">
											<div class="banchay-img">
												<a href="view.php?id=<?php echo $row_cat1['pro_id']; ?>" title="Bàn ăn"><img src="../uploads/<?php echo $row_cat1['image']; ?>"></a>
											</div>
											<div >
												<h3 ><a href="view.php?id=<?php echo $row_cat1['pro_id']; ?>" style="color: gray;" ><p><?php echo $row_cat1['pro_name']; ?></p></a></h3>
												<div class="banchay-price">
													<h6>Giá: <span><?php echo number_format($row_cat1['price']) .' VND'; ?></span></h6>
												</div>
											</div>
										</div>
									</li>
									
									
								</ul>		
							</div>
						</div>
						<?php }} ?>
						<!-- ban chay -->
					</div>
				</div>
			</div>
			<div class="col-md-9" style="padding-right: 0px;">
				<div class="col-md-12">
					<div class="row">
						<div>
							<div class="index-img">
								<a href="category-product.php?cat=1"><img src="../img/sofa-banner2.jpg" alt=""></a>
							</div>
							<div class="index-products">
								<?php 	
				
					
									$sql_cat = "Select * from product where cat_id=1 ORDER BY add_date DESC limit 3  ";
									$res_cat = mysqli_query($conn,$sql_cat);




									/*tinh phan tram gias  sale*/
									
									
									?>
									<?php if ($res_cat){ while ($row_cat1 = mysqli_fetch_assoc($res_cat)) {

									$goc=$row_cat1['price'];
									$sale=$row_cat1['sale_price'];
									$sale_rate = ceil(100-((100*$sale)/$goc));



									 ?>
									<div style="margin-right: -20px;">
						
								<div class="product hvr-float-shadow">
									<div>
										<div class="pro-img hvr-bounce-out">
											<a href="view.php?id=<?php echo $row_cat1['pro_id']; ?>" title="Sofa Góc GA-410"><img class="img-responsive" src="../uploads/<?php echo $row_cat1['image']; ?>"></a>
											<span class="sale-icon"><?php echo '- '.$sale_rate; ?>%</span>
										</div>
										<div class="pro-details">
											<a href="view.php?id=<?php echo $row_cat1['pro_id']; ?>"><?php echo $row_cat1['pro_name']; ?></a>
											<p>Giá KM: <span><?php echo number_format($row_cat1['sale_price']).' VND'; ?></span></p>
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