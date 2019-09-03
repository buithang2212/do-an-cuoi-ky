

<?php 
//var_dump($admin);die();
//$admin=isset($_SESSION['user_login']) ? $_SESSION['user_login'] : '';
if (isset($_POST['changepass'])) {
	$oldpass=md5($_POST['oldpass']);
	$newpass=md5($_POST['newpass']);
	$renewpass=md5($_POST['renewpass']);
	//$u = $_SESSION['user_login'];
	var_dump($admin	);
	$uemail = $admin['Email'];

	if ($admin['password']!=$oldpass) {
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
  <!--   ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
