<?php require_once 'header.php'; ?>
<?php $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';

if (isset($_POST['order'])) {
	$tran_tus=1;
	$user_id=$user['user_id'];
	$user_name=$_POST['namee'];
	$user_email=$user['Email'];
	$user_phone=$_POST['phonee'];
	$address=$_POST['address'];
	$message=$_POST['message'];
	$methodpay=$_POST['methodpay'];
	$methodpost=$_POST['methodpost'];
	$amount=tong_tien();
	$tran_created=date('y-m-d');
	$table = '';
	$sql_tran="insert into orders (	orderstatus,userid,username,useremail,phone,address,totalamount,paymentmethod,transportstatus,message,orderdate) values ('$tran_tus','$user_id','$user_name','$user_email','$user_phone','$address','$amount','$methodpay','$methodpost','$message','$tran_created')";
	$res_tran=mysqli_query($conn,$sql_tran);

	
	if ($res_tran) {
		$orderid = mysqli_insert_id($conn);
		//var_dump($cart);

		
		foreach ($cart as $c) {
			$productid=$c['pro_id'];
			$quantity=$c['quantity'];
			$amount_order=$c['sale_price'];
			$sql_order="insert into orderdetails(orderid, productid, quantity, amount_order) VALUES ('$orderid','$productid','$quantity','$amount_order')";
		}

			//var_dump($sql_order) ;die();
			//var_dump($cart);
			$ten=$user_name;
			$gia=number_format($amount);

			$res_order=mysqli_query($conn,$sql_order);
			$table = '<h3>Tên Người nhận: '.$ten.'</h3>
					<h3>giá: '.$gia.' VNĐ</h3>
					<h3>Địa chỉ nhận: '.$address.'</h3>

					</div>
					';
				//var_dump($table);		
		
		$tbl = '<div style="border-radius: 4px; height:300px;width: 200px; border: 1px solid black; padding: 10px;background-color: #C2E3CA	">
					<h2 style="text-align:center; color: red; " >Đơn hàng số '.$orderid.'</h2>
					<h5>ngày đặt:'.$tran_created.'</h5>'.$table;
	
	
		sendorder($user_email,$user_name,$tbl);
		echo"<script language='javascript'>alert('Đặtt hàng thành công');window.location.href='index.php';</script>";
		//header('location: index.php');
	

	
	unset($_SESSION['cart']);
	
	
	
}
}

$n=1; 
?>
<div class="container">
	<form action="" method="POST" role="form">
		<div class="col-xs-3">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin khách hàng</h3>
				</div>
				<div class="panel-body">

					<div class="form-group">
						<label for="namee">Họ tên quý khách (*)</label>
						<input type="text" class="form-control" id="namee" name="namee" minlength="4" maxlength="64" placeholder="Họ tên đầy đủ" required="">
						<input type="hidden" class="form-control" id="emaill" name="email" placeholder="Input field">

					</div>

					<div class="form-group">
						<label for="phonee">Số điện thoại (*)</label>
						<input type="text" class="form-control" id="phonee" name="phonee" placeholder="Số điện thoại" required="" minlength="10" maxlength="11">
					</div>

					<div class="form-group">
						<label for="message">Lời nhắn</label>
						<textarea  rows="2" type="text" class="form-control" id="message" name="message" placeholder="Lời nhắn (Tối đa 2000 ký tự)"></textarea>
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ (*)</label>
						<textarea  rows="4" type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ chi tiết" required=""></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-5">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Hình thức thanh toán</h3>
				</div>
				<div class="panel-body">
					<div class="radio">
						<label for="input">
							<input type="radio" name="methodpay" id="input" value="1" > Thanh toán trực tiếp
						</label>
					</div>
					<div class="radio">
						<label for="input1">
							<input type="radio" name="methodpay" id="input1" value="2" checked="checked" > Thanh toán tại nơi giao hàng
						</label>
					</div>
					<div class="radio">
						<label for="input2">
							<input type="radio" name="methodpay" id="input2" value="3" > Thanh toán bằng chuyển khoản
						</label>
					</div>
					
					<div class="radio">
						<label for="input6">
							<input type="radio" name="methodpay" id="input6" value="4" > Thanh toán trực tuyến bằng thẻ quốc tế Visa
						</label>
					</div>
				</div>
			</div>
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Hình thức vận chuyển</h3>
				</div>
				<div class="panel-body">
					<div class="radio">
						<label for="input7">
							<input type="radio" name="methodpost" id="input7" value="1"  checked="checked" > Vận chuyển tính phí theo thỏa thuận
						</label>
					</div>
					<div class="radio">
						<label for="input11">
							<input type="radio" name="methodpost" id="input11" value="2" > Miễn phí trong nội thành Hà Nội
						</label>
					</div>
					<div class="radio">
						<label for="input21">
							<input type="radio" name="methodpost" id="input21" value="3" > Miễn phí trong 35 KM
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-4">
			<?php if($cart) { foreach($cart as $c) { 
				$t= $c['quantity']*$c['sale_price']; 
				?>

				<div class="price-details">
					<h3>Chi tiết đơn hàng</h3>
					<span>Mã sp</span>
					<span class="total1"><?php echo($c['pro_id']) ?></span>
					<span>Tên sản phẩm</span>
					<span class="total1"><?php echo $c['pro_name'] ?></span>
					<span>Số lượng</span>
					<span class="total1"><?php echo $c['quantity'] ;?></span>
					<span>Tổng tiền</span>
					<span class="total1"><?php echo $t ?></span>
					<div class="clearfix"></div>        
				</div> 

				<?php $n++; } } ?>
				<ul class="total_price">
					<li class="last_price"> <h4>Tổng Tiền</h4></li>  
					<li class="last_price"><span><?php echo tong_tien(); ?>.vnđ</span></li>
					<div class="clearfix"> </div>
				</ul>
				<div class="col-md-4 cart-total" style="margin-top: 20px">
					<?php if($user){ ?>
					<button type="submit" name="order" class="btn btn-danger form-controll" >Xác nhận đơn hàng</button>
					<?php }else{ ?>
					<a data-toggle="modal" href='#modal-signin'  class="btn btn-danger form-controll">Đăng nhập để thanh toán</a>

					<?php  
				} ?>
			</div>
			<!-- //////////////// -->
		</div>  
	</form>  
</div>


</div>
<?php require_once 'footer.php'; ?>