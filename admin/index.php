<?php 
	session_start();
	include 'header.php'; 
	$module = isset($_GET['module']) ? $_GET['module'] : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$file = 'modules/'.$module.'/'.$action.'.php'; 
$cou_order="select sum(totalamount) from orders where orderstatus=2";
$re_order=mysqli_query($conn,$cou_order);
$ro_order=mysqli_fetch_assoc($re_order);
//var_dump($ro_order);
$cou_sl="select sum(quantity) from (orderdetails INNER JOIN orders on orderdetails.orderid = orders.orderid ) where orderstatus = 2";
$re_sl=mysqli_query($conn,$cou_sl);
$ro_sl=mysqli_fetch_assoc($re_sl);
////////
$sq_or="select * from orders";
$re_or=mysqli_query($conn,$sq_or);
$ro_or=mysqli_num_rows($re_or);

if (file_exists($file)) {
	include $file;
}else{?>
	
<div class="col-md-10">
	
	 <div class="row tile_count">
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top "><i class="fa fa-d"></i> Tổng Số đơn hàng</span>
              <div class="count"><?php echo $ro_or ?></div>
              <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa "></i> Số sản phẩm được bán ra</span>
              <div class="count"><?php echo $ro_sl['sum(quantity)'] ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa "></i> Tổng doanh thu</span>
              <div class="count green"><?php echo number_format($ro_order['sum(totalamount)']).' VND'; ?></div>
              <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div> -->
          </div>
</div>








	<?php } ?>




<?php  	include 'footer.php'; 

?>
