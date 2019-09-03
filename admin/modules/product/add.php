
<?php  include'../sql/connect.php' ?>


<?php 	


//lay ra duwx lieeuj cua bang category
$query_cat = "Select * from category ";
$result_cat = mysqli_query($conn,$query_cat);


//lấy ra du lieu bảng status
$query_tus = "Select * from status";
$result_tus = mysqli_query($conn,$query_tus);




//khai bao bien chuwa anh 
$pro_image='';//bằng rỗng
if (!empty($_FILES['pro_image'])) {
	//nếu biền _FILE tạo vị trí có giá trị name =pro_image

	$file=$_FILES['pro_image'];//gán $_FILES['pro_image'] vào biến có tên là file
	// var_dump($file);die;
	//$_FILES['file']['tmp_name'] − File đã upload trong thư mục tạm thời trên Web Server.
	if(move_uploaded_file($file['tmp_name'], '../uploads/'.$file['name'])){

		$pro_image=$file['name'];
	}
}
//dùng thêm một lện if để nếu đúng và upload ảnh thành công thì nó gán tên ảnh bằng tên của cái sản phẩn
///=======================
// buoc 2: lay du lieu tren form qua $_POST

if(!empty($_POST)){
$pro_name=$_POST['pro_name'];
$cat_id =$_POST['cat_id'];
$pro_price=$_POST['pro_price'];
$pro_sale_price=$_POST['pro_sale_price'];
$pro_content=$_POST['pro_content'];
$status=$_POST['status'];
$add_date=date('y-m-d');
//insert dữ liệu từ from vào database
$sql="insert into product(pro_name,cat_id,price,sale_price,image ,status,pro_content,add_date) value 
('$pro_name','$cat_id','$pro_price','$pro_sale_price','$pro_image','$status','$pro_content','$add_date')";

if (mysqli_query($conn,$sql)) {
	echo 'Thêm Thành công';}
	else {
		echo 'Có Lỗi Truy Vấn';
	}
	
}
 ?>
<div class="col-md-10">
	
  <div class="starter-template">
    <div class="lead">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Thêm sản phảm</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
				
					<div class="form-group">
						<label for="pro_name">Tên Sản Phẩm</label>
						<input type="text" name="pro_name" class="form-control" id="pro_name" placeholder="Tên Sản Phẩm" required="">
					</div>
					<div class="form-group">
						<label for="cat_id">Danh Mục</label>
						<select name="cat_id" id="inputCat_id" class="form-control" required="required">
							<option value="">Chọn Danh Mục</option>
							<?php while ($cat = mysqli_fetch_array($result_cat )) { ?>
								<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
							<?php } ?>

						</select>
					</div>
					<div class="form-group">
						<label for="pro_image">Ảnh sản phẩm</label>
						<input type="file" name="pro_image" class="form-control" id="pro_image" >
					</div>
					<div class="form-group">
						<label for="pro_price">Giá Gốc</label>
						<input type="number" name="pro_price" class="form-control" id="pro_price" placeholder="Giá Gốc">
					</div>
					<div class="form-group">
						<label for="pro_sale_price">Giá Khuyến Mại</label>
						<input type="number" name="pro_sale_price" class="form-control" id="pro_sale_price" placeholder="Giá Khuyến Mại">
					</div>
					<div class="form-group">
						<label for="status">Trạng Thái</label>
						<select name="status" id="status" class="form-control" required="required">
							<option value="">--Trạng thái sản phẩm --</option>
							<?php while ($tus = mysqli_fetch_array($result_tus )) { ?>
								<option value="<?php echo $tus['tus_id']; ?>"><?php echo $tus['tus_name']; ?></option>
							<?php } ?>

						</select>
					</div>
					<div class="form-group">
						<label for="	pro_content">Mô Tả</label>
						<textarea name="pro_content" id="pro_content" class="form-control" ></textarea>
					</div>
					
						
				
					<button type="submit" class="btn btn-success">Thêm</button>
					<button type="reset" class="btn btn-danger">Hủy</button>
				</form>
			</div>
		</div>


    </div>
  </div>
</div>