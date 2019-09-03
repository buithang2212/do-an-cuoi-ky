
<?php  include'../sql/connect.php' ?>


<?php 	
//khai bao bien chuwa anh 
$cat_image='';//bằng rỗng
if (!empty($_FILES['cat_image'])) {
	//nếu biền _FILE tạo vị trí có giá trị name =pro_image

	$file=$_FILES['cat_image'];//gán $_FILES['pro_image'] vào biến có tên là file
	// var_dump($file);die;
	//$_FILES['file']['tmp_name'] − File đã upload trong thư mục tạm thời trên Web Server.
	if(move_uploaded_file($file['tmp_name'], '../img/'.$file['name'])){

		$cat_image=$file['name'];
	}
}

if(!empty($_POST)){
$cat_name=$_POST['cat_name'];

//insert dữ liệu từ from vào database
$sql="insert into category(cat_name,cat_image) value 
('$cat_name','$cat_image' )";

if (mysqli_query($conn,$sql)) {
	echo 'Thêm Thành công';
	header('location: index.php?module=category&action=list');
	}else {
		echo 'Có Lỗi Truy Vấn';
	}
	
}

 ?>

  <div class="col-md-10">
  	<div class="starter-template">
    <div class="lead">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Thêm sản Danh Mục</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
				
					<div class="form-group">
						<label for="cat_name">Tên Danh MỤC</label>
						<input type="text" name="cat_name" class="form-control" id="cat_name" placeholder="Tên Sản Phẩm" required="">
					</div>
					<div class="form-group">
						<label for="cat_name">Ảnh Đại Diện Danh Mục</label>
						<input type="file" name="cat_image" class="form-control" id="cat_name" placeholder="Tên Sản Phẩm" required="">
					</div>
					<button type="submit" class="btn btn-success">Thêm</button>
					<button type="reset" class="btn btn-danger">Hủy</button>
				</form>
			</div>
		</div>


    </div>
  </div>
  </div>