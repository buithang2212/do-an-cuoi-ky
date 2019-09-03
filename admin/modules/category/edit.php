<?php 	include'../sql/connect.php'; ?>
<?php 	
//lấy ra id cuả sản phẩm
$id=isset($_GET['id']) ? $_GET['id']:0;
$sql="select * from category where cat_id =$id LIMIT 1";
$res=mysqli_query($conn,$sql);

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

	

	$sql = "update category set cat_name='$cat_name',cat_image='$cat_image' where cat_id = $id";
	if (mysqli_query($conn,$sql)) {
		header('location: index.php?module=category&action=list');
	} else{
		echo "có lôi cập nhật";
	}
}
$row=mysqli_fetch_assoc($res);

 ?>
<div class="col-md-10">
	
 <div class="panel-body">
 	<form action="" method="POST" role="form" enctype="multipart/form-data">

 		<div class="form-group">
 			<label for="pro_name">Tên Danh Mục</label>
 			<input type="text" name="cat_name" class="form-control" id="cat_name"  value="<?php echo $row['cat_name']  ?>">
 		</div>
 		
 		<div class="form-group">
			<label for="cat_name">Ảnh Đại Diện Danh Mục</label>
			<input type="file" name="cat_image" class="form-control" id="cat_name" placeholder="Tên Sản Phẩm" required="">
		</div>
 		
 		<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-saved"></span>Lưu </button>

 		<a href="index.php?module=category&action=list" class="btn btn-sm btn-default"> <span class="glyphicon glyphicon-remove-sign"></span>Hủy</a>
		<a href="index.php?module=category&action=delete&id=<?php echo $id ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')"><span class="glyphicon glyphicon-trash"></span>Xóa</a>


 	</form>
 </div>
</div>