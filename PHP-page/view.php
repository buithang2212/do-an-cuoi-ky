<?php include 'header.php'; ?>

<style type="text/css" media="screen">
	.product-details{
		padding: 20px 0px;
		width: 100%;
		float: left;
	}
	.product-details ul{
		list-style: none;
		line-height: 20px;
		padding: 0px;
	}

	.product-details span:nth-child(1){
		font-weight: bold;
	}
	.product-details span:nth-child(2){
		font-weight: bold;
		color: red;
	}

	.pro-desciption{
		margin-top: 20px;
		float: left;
		width: 100%;
	}
	.tab-content{
		padding: 20px;
	}
</style>

<?php 
$id= isset($_GET['id']) ?$_GET['id'] :0;
$sql="select * from product where pro_id = $id  limit 1";
$res_view=mysqli_query($conn,$sql);
$row_view=mysqli_fetch_assoc($res_view);
 ?>

<div class="container">
	<div class="product-details">
		<div class="col-md-6">
			<img class="img-responsive" src="../uploads/<?php echo $row_view['image']; ?>">
		</div>


		<div class="col-md-6">
			<ul>
				<li style=" margin-bottom: 20px; font-size: 20px;"><a href=""><?php echo $row_view['pro_name']; ?></a></li>
				<div style="margin-bottom: 20px;" >
					<li><p>- Mã SP: <?php echo $row_view['pro_id'] ?></p></li>
					<li><p>- Kích thước: 280 x 160 cm</p></li>
					<li><p>- Chất liệu: nỉ nhập khẩu</p></li>
					<li><p>- Khung: gỗ sồi tự nhiên</p></li>
				</div>
				<!-- <li><p>Chân ghế</p></li>
				<li><p>Tích hợp loa bluetooth và sạc điện thoại</p></li> -->
				<li ><p><span>Giá Gốc: </span><span style="color: black;"><s><?php echo $row_view['price'] ?>.vnd</s></span></p></li>
				<li><p><span>Giá Khuyến Mại: </span><span><?php echo number_format($row_view['sale_price']). 'VND' ?></span></p></li>
				<li><a href="insert_cart.php?action=add&id=<?php echo $row_view['pro_id'] ?>" class="btn-sm btn-danger"> Thêm vào giỏ hàng</a></li>
			</ul>
		</div>
	</div>

	<div class="pro-desciption">
		<div class="col-md-4">
			<?php include 'camket.php'; ?>
		</div>


		<div class="col-md-8">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Hình Ảnh</a>
					</li>
					<li role="presentation">
						<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Mô Tả</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home"> 

					<img src="../uploads/<?php echo $row_view['image'] ?> " alt="" style="height: 400px; width: 100%">


						
					
					</div>
					<div role="tabpanel" class="tab-pane" id="tab">
						<?php echo$row_view['pro_content'] ?>
					</div>
				</div>
				<div class="fb-comments" data-href="http://localhost:8080/hoang/hoang/PHP-page/index.php" data-numposts="5"></div>
			</div>
		</div>
	</div>





</div>

<?php include 'footer.php'; ?>
