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
					<div id="demo" class=" collapse">
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