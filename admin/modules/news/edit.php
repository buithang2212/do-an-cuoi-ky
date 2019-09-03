
<?php  include'../sql/connect.php' ?>


<?php 	
$id = isset($_GET['id']) ?$_GET['id'] :0;
// echo $id;
$sql="select * from news where news_id = $id";
$res_news =mysqli_query($conn,$sql);
$row_news =mysqli_fetch_assoc($res_news);
echo $id;



//khai bao bien chuwa anh 

//dùng thêm một lện if để nếu đúng và upload ảnh thành công thì nó gán tên ảnh bằng tên của cái sản phẩn
///=======================
// buoc 2: lay du lieu tren form qua $_POST

if(isset($_POST['save'])){
	if (!empty($_FILES)) {
		//nếu biền _FILE tạo vị trí có giá trị name =pro_image
		$file=$_FILES['news_image_upload'];//gán $_FILES['pro_image'] vào biến có tên là file
		if(!$file['error']){
			if(move_uploaded_file($file['tmp_name'],'../uploads/news/'.$file['name'])){
				$_POST['news_image'] = $file['name'];
				$news_image=$_POST['news_image'];
			}
		}
		// var_dump($_POST['news_image']);
	}

	$news_title =$_POST['news_title'];
	$news_summary=$_POST['news_summary'];
	$news_content=$_POST['news_content'];
	$news_add_date=date('y-m-d');
	// var_dump($news_title);
	// insert dữ liệu từ from vào database
	$sql="update news set 
	news_title='$news_title',
	news_summary='$news_summary',
	news_content='$news_content',
	news_add_date='$news_add_date',
	news_image='$news_image'
	where news_id=$id";
	// var_dump($sql);

	if (mysqli_query($conn,$sql)) {
		header('location: index.php?module=news&action=list');
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
				<h3 class="panel-title">Sửa Tin</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" role="form" enctype="multipart/form-data">

					<div class="form-group">
						<label for="news_title">Tiêu đề</label>
						<input type="text" name="news_title" class="form-control" id="news_title" placeholder="tiêu đề" required="" value="<?php echo $row_news['news_title']; ?>">
					</div>
					<div class="form-group">
						<label for="news_summary">tóm tắt</label>
						<input type="text" name="news_summary" class="form-control" id="news_summary" placeholder="tiêu đề" required="" value="<?php echo $row_news['news_summary'] ?>">
					</div>
					
					<div class="form-group">
						<label for="$news_image">Ảnh tin</label>
						<input type="file" name="news_image_upload" class="form-control" id="news_image" value="">
						<input type="hidden" name="news_image" class="form-control" id="news_image" value="">
						<img src="../uploads/news/<?php echo $row_news['news_image']; ?> " alt=""> 
					</div>
					
					
				</div>
				 <div class="form-group">
					<label for="news_content">Nội Dung</label>
					<textarea name="news_content" id="news" class="form-control" rows="10" ><?php echo $row_news['news_content']; ?></textarea>
				</div>
				<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
				<script type="text/javascript">
					tinymce.init({
						selector: '#news',
						height: 500,
						theme: 'modern',
						plugins: [
						'advlist autolink lists link image charmap print preview hr anchor pagebreak',
						'searchreplace wordcount visualblocks visualchars code fullscreen',
						'insertdatetime media nonbreaking save table contextmenu directionality',
						'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
						],
						toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
						toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
						image_advtab: true,
						templates: [
						{ title: 'Test template 1', content: 'Test 1' },
						{ title: 'Test template 2', content: 'Test 2' }
						],
						content_css: [
						'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
						'//www.tinymce.com/css/codepen.min.css'
						]
					});
				</script>
			

			<button type="submit" name="save" class="btn btn-success">Lưu Lại</button>
			<button type="reset" class="btn btn-danger"><a href="index.php?module=news&action=list">Hủy</a></button>
		</form>
	</div>
</div>


</div>
</div>
</div>