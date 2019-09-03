<?php ob_start(); ?>

<style type="text/css">
	.modal-header h4{
		text-align: center;
		font-size: 40px;
	}
</style>

<?php
$urrl = $_SERVER['PHP_SELF']; 
//echo $urrl;
if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$sql_check="select * from user where Email='$email' LIMIT 1";
	$res_check=mysqli_query($conn,$sql_check);
	if($res_check && mysqli_num_rows($res_check)==0){
		echo "<script language='javascript'>alert('email không tồn tại');</script>";
	}else{
		$row = mysqli_fetch_assoc($res_check);

		if($password != $row['password']){	
			echo "<script language='javascript'>alert('Mật khẩu không đúng')</script>";		
			
		}else{
			$_SESSION['user_login']=$row;
			echo "<script language='javascript'>alert('Đăng nhập thành công');window.location.href='$urrl';</script>";
			
		}
	}
}
?>


<div class="modal fade" id="modal-signin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom-style: dotted;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Đăng nhập</h4>
			</div>
			<div class="modal-body">



				<div class="container-fluid"> 
					<div class="row-fluid"> 
						<div id="box"> 
							<form class="form-horizontal" action="" method="post"> 
								<fieldset> 
									<div class="form-group"> 
										<div class="col-md-12"> 
											<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input name="email" placeholder="Email" class="form-control" type="text" style="margin: 0px;"> 
											</div> 
										</div> 
									</div> 
									<!-- user name -->
									<div class="form-group"> 
										<div class="col-md-12"> 
											<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

												<input name="password" placeholder="Password" class="form-control" type="password" style="margin: 0px;"> 

											</div> 
										</div> 
									</div> 
									<!-- password -->
									<div class="form-group"> 
										<div class="container" style="width: auto;">
											<input type="checkbox" style="cursor: pointer;">Nhớ mật khẩu
											<a href="#modal-forgot" id="forgotpass" style="float: right;">Quên mật khẩu</a>
										</div>
									</div>

										
									<!-- remember me -->
									<div class="form-group"> 
										<div class="col-md-12"> 
											<button type="submit" class="btn btn-md btn-danger btn-block" name="login">Đăng nhập</button>
										</div> 
									</div> 
									<!-- button -->
								</fieldset> 
							</form> 
							<!-- form -->
						</div> 
					</div>
				</div>
				<!-- modal body -->
			</div>
		</div>
	</div>
</div>
<?php 


if(isset($_POST['register'])){

	$username=$_POST['username'];
	$email =$_POST['email'];
	$password=md5($_POST['password']);
	$password2=md5($_POST['password2']);
	$status=1;
	$add_date=date('y-m-d');
	$s="select * from user where Email ='$email'";
	$res_mail=mysqli_query($conn,$s);
	$count_mail=mysqli_num_rows($res_mail);
	$_SESSION['register']=['username'=>$username,'email'=>$email,'password'=>$_POST['password'],'password2'=>$_POST['password2']];
	$t=$_SESSION['register'];
	if($count_mail >0 ){


		echo "<script language='javascript'>alert('email ko hợp lệ')</script>";

	}else{

		$sql_user="insert into user(user_name,Email,password,status,add_date) values 
		('$username','$email','$password','$status','$add_date')";



		if (mysqli_query($conn,$sql_user)) {
			echo "<script language='javascript'>alert('Đăng kí thành công');</script>	";
		} else { 	
			echo "<script language='javascript'>alert('thông tin hợp lệ');</script>";
		}

	} 
}
?>
<div class="modal fade" id="modal-signup">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom-style: dotted;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-globe"></i> Đăng ký thành viên!</h4>
			</div>
			<div class="modal-body">



				<div class="container" style="width: auto;"> 
					<div class="row"> 
						<div class="col-md-12"> 
							<form action="#" method="post" class="form" role="form"> 
								<div class="row"> 

									<div class="col-xs-12 col-md-12 signup"> <input id="email" class="form-control" name="email" placeholder="Email" required="" type="email" value="<?php if (isset($t['email'])){
										echo $t['email'];
									} else{}
									?> "  > </div>
									<!-- email -->
									<div class="col-xs-12 col-md-12 signup"> <input id="username" class="form-control" name="username"  required=""  placeholder="Tên người dùng" type="text"  value="<?php if (isset($t['username'])){echo $t['username'];
									} else{}
									?> "> </div>





									<div class="col-xs-12 col-md-12 signup"> <input id="password" class="form-control" name="password" placeholder="Mật khẩu" required="" type="password" id="password" > </div>
									<!-- mật khẩu -->

									<div class="col-xs-12 col-md-12 signup"> <input id="password2" class="form-control" name="password2" placeholder="Nhập lại mật khẩu" required="" type="password" id="password2"  onkeyup ="checkPass(); return false;"> 
										<span id="error"></span>
									</div>
									<!-- nhập lại mk -->

									<!-- ngày sinh -->

									<!-- giới tính -->					
								</div>								
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="register"> Đăng ký</button> 
							</form> 
						</div> 
					</div>
				</div>
			</div>
			<!-- modal body -->
		</div>
	</div>
</div>
<script type="text/javascript">

	function checkPass()
	{

    var pass1 = document.getElementById('password');//lấy giá tri của 2 mật khâu qua ID
    var pass2 = document.getElementById('password2');

    var message = document.getElementById('error');//id để báo cho người dùng 
    //khai báo biến màu 
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){

        pass2.style.backgroundColor = goodColor;//nếu đúng backgrondcolor sẽ hiện ra màu xanh
        message.style.color = goodColor;//chữ hiện ra màu xanh
        message.innerHTML = "Passwords hợp lệ"
    }else{
        pass2.style.backgroundColor = badColor;//nếu sai backgrondcolor hiện màu đỏ
        message.style.color = badColor;//chứ hiện màu đỏ
        message.innerHTML = "Passwords không hợp lệ"
    }
}  
</script>


<?php 
$user=isset($_SESSION['user_login']) ? $_SESSION['user_login'] : '';
if (isset($_POST['changepass'])) {
	$oldpass=md5($_POST['oldpass']);
	$newpass=md5($_POST['newpass']);
	$renewpass=md5($_POST['renewpass']);
	$u = $_SESSION['user_login'];
	// var_dump($u);
	$uemail = $u['Email'];

	if ($user['password']!=$oldpass) {
		echo"<script>alert('mật khẩu cũ không đúng')</script>";}
	
	else	{if ($newpass==$renewpass) {
			$update="update user set password = '$newpass' where Email = '$uemail'";
			$res_up=mysqli_query($conn,$update);
			if ($res_up) {
				echo "<script language='javascript'>alert('Đổi mật khẩu  thành công');window.location.href='logout.php';</script>";
				}else{
				echo "<script language='javascript'>alert('Đổi mật khẩu không thành công');window.location.href='logout.php';</script>" ;
			}
		}else{
			echo"<script language='javascript'>alert('mật khẩu mới phải trùng nhau');window.location.href='logout.php';</script>";
		}

}
}

?>

<div class="modal fade" id="modal-changepass">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom-style: dotted;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">đổi mật khẩu</h4>
			</div>
			<div class="modal-body">



				<div class="container-fluid"> 
					<div class="row-fluid"> 
						<div id="box"> 
							<form class="form-horizontal" action="index.php" method="post"> 
								<fieldset> 
									<div class="form-group"> 
										<div class="col-md-12"> 
											<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input name="oldpass" placeholder="Mật khẩu cũ" class="form-control" type="password" style="margin: 0px;"> 
											</div> 
										</div> 
									</div> 
									<!-- user name -->
									<div class="form-group"> 
										<div class="col-md-12"> 
											<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

												<input name="newpass" placeholder=" mật khẩu mới" class="form-control" type="password" style="margin: 0px;"> 

											</div> 
										</div> 
									</div>
									<div class="form-group"> 
										<div class="col-md-12"> 
											<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

												<input name="renewpass" placeholder="Nhắc lại mật khẩu mới" class="form-control" type="password" style="margin: 0px;"> 

											</div> 
										</div> 
									</div> 
									<!-- password -->
									
									<!-- remember me -->
									<div class="form-group"> 
										<div class="col-md-12"> 
											<button type="submit" class="btn btn-md btn-danger btn-block" name="changepass">Lưu</button>
										</div> 
									</div> 
									<!-- button -->
								</fieldset> 
							</form> 
							<!-- form -->
						</div> 
					</div>
				</div>
				<!-- modal body -->
			</div>
		</div>
	</div>
</div>

<?php 
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str = substr( str_shuffle( $chars ), 0, $length );


 }
 return $str;
}

if (isset($_POST['forgot'])) {
	$email=$_POST['email'];
	$forgotpass="select * from user where Email= '$email'";
	$re_forgot=mysqli_query($conn,$forgotpass);
	$ro_forgot=mysqli_num_rows($re_forgot);
	$roww=mysqli_fetch_assoc($re_forgot);
	$name=$roww['user_name'];
	$newpass=rand_string(6);
	$uppass=md5($newpass);
	//  var_dump($newpass);
	//  var_dump($uppass);
	// die();

	
	if ($ro_forgot==1) {
		$uppass="update user set password='$uppass' where Email='$email'";
		$res_pass=mysqli_query($conn,$uppass);
		//var_dump($uppass);die();
		if ($res_pass) {
			$new = 'Mật khẩu mới của bạn là '.$newpass.' Vui lòng bảo mật thông tin';
			senMail($email,$name,$new);
		}
		
	}
}

 ?>


<div class="modal fade" id="modal-forgot">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom-style: dotted;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Quên mật khẩu</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid"> 
					<div class="row-fluid"> 
						<div id="box"> 
							<form class="form-horizontal" action="index.php" method="post"> 
								<fieldset> 
									<div class="form-group"> 
										<div class="col-md-12"> 
											<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input name="email" placeholder="Email đã đăng kí" class="form-control" type="text" style="margin: 0px;"> 
											</div> 
										</div> 
									</div> 
									<div class="form-group"> 
										<div class="col-md-12"> 
											<button type="submit" class="btn btn-md btn-danger btn-block" name="forgot">Xác nhận</button>
										</div> 
									</div> 
								</fieldset> 
							</form> 
							<!-- form -->
						</div> 
					</div>
				</div>
				<!-- modal body -->
			</div>
		</div>
	</div>
</div>
<?php 
//var_dump($user)
$id =isset($user['user_id'])?$user['user_id']:'';
//var_dump($id);
$sql_order=" select * from orders where userid = $id ";
$res_user=mysqli_query($conn,$sql_order);
//var_dump($row_order = mysqli_fetch_assoc($res_order));

 ?>

<div class="modal fade" id="modal-orderdetails">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom-style: dotted;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Thông tin đơn hàng</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid"> 
					<div class="row-fluid"> 
						<div class="">
							<div class="">Quản lí đơn hàng</div>
										<?php 
								if ($res_user) {
							while($row_user = mysqli_fetch_assoc($res_user)) { ?>
							
										<div class="row">
											<div class="col-md-12" style="padding: 20px;background-color: "> 
										<div class="col-md-4">Mã Đơn Hàng: <?php echo $row_user['orderid']; ?></div>
										<div class="col-md-4">Ngày đặt <?php echo $row_user['orderdate']; ?></div>
										<div class="col-md-4"> Tổng tiền: <?php echo $row_user['totalamount']; ?></div>
										
										<div><hr></div>
										</div> 
										</div>
										<?php 
										$id_detail=$row_user['orderid'];
										$sql_detai=" select * from product,orders,orderdetails where orders.orderid = orderdetails.orderid and orderdetails.productid = product.pro_id and orders.orderid = $id_detail ";
										$res_detail=mysqli_query($conn,$sql_detai);


										if ($res_detail) {while ( $row_detai=mysqli_fetch_assoc($res_detail)) { ?>
										<div class="col-md-12" style="padding: 20px">

										
										 <div class="col-md-6"><div><img style="height: 50px" src="../uploads/<?php echo $row_detai['image'] ?> " alt="" ></div></div>
										 <div class="col-md-6" style="font-size: 12px">
										 	<div>Mã SP: <?php echo $row_detai['pro_id']; ?></div>
										 	<div>Tên SP:<?php echo $row_detai['pro_name']; ?></div>
										 	<div>Giá Tại lúc mua: <?php echo $row_detai['amount_order']; ?></div>

										 </div>
											
										</div> 
										<?php }} ?>
									
									<?php } }?>
							</div>
						</div> 
					</div>
				</div>
				<!-- modal body -->
			</div>
		</div>
	</div>
</div>