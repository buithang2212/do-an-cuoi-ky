<?php 	include'../sql/connect.php'; ?>
<?php 	
//lấy ra id cuả sản phẩm
$id=isset($_GET['id']) ? $_GET['id']:0;
$query_pro="select * from Product where pro_id =$id LIMIT 1";
$result_pro= mysqli_query($conn,$query_pro);
$row_pro= mysqli_fetch_assoc($result_pro);
//lay ra duwx lieeuj cua bang category
$a=$row_pro['cat_id'];//lấy về cat-id cua bảng product để truy vấn vào bảng categogry
$b=$row_pro['status'];//lấy về status-id qua bang product
//
$sql_cat1 ="select cat_id,cat_name from category Where cat_id = $a";
$res_cat1 =mysqli_query($conn, $sql_cat1);
$row_cat1 =mysqli_fetch_assoc($res_cat1);
//
$sql_tus1 ="select * from status Where tus_id = $b";
$res_tus1 =mysqli_query($conn, $sql_tus1);
$row_tus1 =mysqli_fetch_assoc($res_tus1);
//
//------------------------------------------
$sql_cat ="select cat_id,cat_name from category";
$res_cat =mysqli_query($conn, $sql_cat);
$row_cat =mysqli_fetch_assoc($res_cat);
//
$sql_tus ="select * from status ";
$res_tus =mysqli_query($conn, $sql_tus);
$row_tus =mysqli_fetch_assoc($res_tus);
//






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
	$pro_description=$_POST['pro_description'];
	$status=$_POST['status'];
	$add_date=date('y-m-d');

		$sql = "update product set
		pro_name='$pro_name',
		cat_id='$cat_id',
		price='$pro_price',
		sale_price='$pro_sale_price',
		image ='$pro_image',
		status='$status',
		pro_content='$pro_description'
		where pro_id = $id";
	if (mysqli_query($conn,$sql)) {
		header('location: index.php?module=product&action=list');
	} else{
		echo "có lôi cập nhật";
	}
}


 ?>

 <div class="col-md-10">
 	<div class="panel-body">
 	<form action="" method="POST" role="form" enctype="multipart/form-data">

 		<div class="form-group">
 			<label for="pro_name">Tên sản phẩm</label>
 			<input type="text" name="pro_name" class="form-control" id="pro_name" placeholder="Input field" value="<?php echo $row_pro['pro_name']  ?>">
 		</div>
 		<div class="form-group">
 			<label for="cat_id">Danh Mục</label>
 			<select name="cat_id" id="inputCat_id" class="form-control" required="required">
 				<option value="<?php echo $row_cat['cat_name'] ?>"><?php echo $row_cat['cat_name']; ?></option>
 				<?php while ($cat = mysqli_fetch_array($res_cat )) { ?>
 				<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
 				<?php } ?>

 			</select>
 		</div>
 		<div class="form-group">
 			<label for="pro_image">Ảnh</label>
 			<input type="file" name="pro_image" class="form-control" id="pro_image"  >
 		</div>
 		<div class="form-group">
 			<label for="pro_price">Giá</label>
 			<input type="number" name="pro_price" class="form-control" id="pro_price" placeholder="Input price" value="<?php echo $row_pro['price']; ?>">
 		</div>
 		<div class="form-group">
 			<label for="pro_sale_price">Giá Khuyến Mãi</label>
 			<input type="text" name="pro_sale_price" class="form-control" id="pro_sale_price" placeholder="Input field" value="<?php echo $row_pro['sale_price']; ?>">
 		</div>
 		<div class="form-group">
 			<label for="status">Trạng Thái</label>
 			<select name="status" id="status" class="form-control" required="required">
 				<option value="<?php echo $row_tus['tus_id'] ?>"><?php echo $row_tus['tus_name']; ?></option>
 				<?php while ($tus = mysqli_fetch_array($res_tus )) { ?>
 				<option value="<?php echo $tus['tus_id']; ?>"><?php echo $tus['tus_name']; ?></option>
 				<?php } ?>
 				

 			</select>
 		</div>
 		<div class="form-group">
 			<label for="pro_description">Mô tả</label>
 			<textarea name="pro_description" id="pro_description" class="form-control" rows="3" value="<?php echo $row_pro['pro_content'] ?>"><?php echo $row_pro['pro_content'] ?></textarea>
 		</div>



 		<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-saved"></span>Lưu sản phảm</button>

 		<a href="index.php?module=product&action=list" class="btn btn-sm btn-default"> <span class="glyphicon glyphicon-remove-sign"></span>Hủy</a>
		<a href="index.php?module=product&action=delete&id=<?php echo $id ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Ban co chac muon xoa ?')"><span class="glyphicon glyphicon-trash"></span>Xóa</a>


 	</form>
 </div>
 </div>