
<?php 	
				$id = isset($_GET['cat']) ? $_GET['cat'] : 0 ;
		
				$sql_cat = "Select * from product  limit 5";
				$res_cat = mysqli_query($conn,$sql_cat);
 ?>
<div class="panel panel-info banchay">
	<div class="banchay-heading">
		<h3 class="panel-title banchay_title">Sản phẩm mới</h3>
	</div>
	<?php if ($res_cat){ while ($row_cat1 = mysqli_fetch_assoc($res_cat)) { ?>
	

	<div class="panel-body">
		<div class="row">
			<ul class="banchay-content">
				<li>
					<div class="banchay-details">
						<div class="banchay-img">
							<a href="" title="Bàn ăn"><img src="../uploads/<?php echo $row_cat1['image']; ?>"></a>
						</div>
						<div>
							<h3><a href="view.php?id=<?php echo $row_cat1['pro_id']; ?>"><?php echo $row_cat1['pro_name']; ?></a></h3>
							<div class="banchay-price">
								<h6>Giá: <span><?php echo $row_cat1['price']; ?></span></h6>
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