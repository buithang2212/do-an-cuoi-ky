<?php  include'../sql/connect.php' ?>
<?php 
$id=isset($_GET['id'])? $_GET['id'] :''; 
$sql="select * from feedback where id_fe=$id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);


//var_dump($row);


 ?>
      <div class="col-md-10">
    <div style="padding: 50px">
    	  	<div class="row">	
    	  	<div class="starter-template">
       
			<div class="col-md-6">
				
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Thông tin</h2>
				</div>
				<div class="panel-body">
					<h2>mã Phản hồi</h2>
					<h2>Họ tên: <?php 	echo $row['name_fe']; ?></h2>
					<h2>Email:  <?php 	echo $row['email_fe']; ?> </h2>
					<h2>Điện thoại:  <?php 	echo $row['phone_fe']; ?> </h2>
					<h2>Địa chỉ:  <?php 	echo $row['adsress_fe'] ?></h2>
					<h2>Ngày phản hồi: <?php 	echo $row['date_fe'] ?></h2>
			</div>
			</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Nội dung</h2>
				</div>
				<div class="panel-body">
					<h2><?php 	echo $row['conten']; ?></h2>
			</div>
			</div>

        
      </div>
      </div>
    </div>
    <a href="index.php?module=feedback&action=list" class="btn btn-info"> Quay lại</a>
      </div>
<?php include 'footer.php'; ?>
