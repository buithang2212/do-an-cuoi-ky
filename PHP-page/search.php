<?php include 'header.php' ?>
<div class="container">
	<div class="search-menu-carousel">

		<div class="col-md-2" style="margin: 0px; padding: 0px;">
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
						<div id="demo" class=" ">
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


		<div class="col-md-10">
			<div class="row">
				<div class="row" style="padding-left: 50px">

					<div class="search-bar">	
						<div class="form-search">
							<form action="search.php" method="post" name="search" class="form-inline" >
								<input type="text" class="form-control" name="searchkey" id="search-action1" placeholder="Tìm kiếm theo tên, thương hiệu,..." style="margin: 0px;">
								<!-- <select name="price" class="form-control">
									<option value="0"  >Tìm theo giá</option>
									<option value="1" >Cao => Thấp</option>
									<option value="2" >Thấp => Cao</option>

								</select> -->
								
								<button type="submit" class="btn btn-default search-action2" name="timkiem"><span class="glyphicon glyphicon-search"></span></button>
							</form>			
						</div>	
						<div class="hotline"><img src="../img/hotlinehome.png" alt="hotline"></div>		
					</div>


				</div>

				<?php 
				if (isset($_POST['timkiem'])) {
					$a=$_POST['searchkey'];


					//if ($a=='' && $b==0) {
						//echo "vui lòng chọn cách tìm kiếm";
						//$sql="select * from product";
					//}
					//if ($a!='' && $b==0) {
					$sql="select * from Product where pro_name LIKE '%$a%'";
					//}
					//if ($a!='' && $b==1) {
						//$sql="select * from Product where pro_name LIKE '%$a%' AND order by price DESC";
					//}
					//if ($a!='' && $b==2) {
						//$sql="select * from Product where pro_name LIKE '%$a%' AND order by price";
					//}
				}
				$res=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($res);
				//var_dump($row); die();


				?>
				<div class="" style="margin-top: 20px;">

					<?php if ($res){ while ($row = mysqli_fetch_assoc($res)) { 
						$goc=$row['price'];
						$sale=$row['sale_price'];
						$sale_rate = ceil(100-((100*$sale)/$goc));
																	//var_dump($row_pro_type);die();
						?>

						<div class="col-md-4" style="margin-bottom: 20px;">

							<div class=" sofa-list-product-details">
								<div>
									<div class="pro-img">
										<a href="view.php?id=<?php echo $row['pro_id']; ?>" title="Sofa Góc GA-410"><img class="img-responsive" src="../uploads/<?php echo $row['image']; ?>"></a>
										<span class="sale-icon"><?php echo '- '.$sale_rate; ?>%</span>
									</div>
									<div class="pro-details">
										<a href="view.php?id=<?php echo $row['pro_id']; ?>" style="color: gray;" ><?php echo $row['pro_name'] ?></a>
										<p>Giá KM: <?php echo number_format($row['sale_price']).' VND'; ?></p>
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