
<?php  include'../sql/connect.php' ?>


<?php 	





//khai bao bien chuwa anh 
$news_image='';//bằng rỗng
if (!empty($_FILES['news_image'])) {
	//nếu biền _FILE tạo vị trí có giá trị name =pro_image

	$file=$_FILES['news_image'];//gán $_FILES['pro_image'] vào biến có tên là file
	// var_dump($file);die;
	//$_FILES['file']['tmp_name'] − File đã upload trong thư mục tạm thời trên Web Server.
	if(move_uploaded_file($file['tmp_name'], '../uploads/news/'.$file['name'])){

		$news_image=$file['name'];
	}
}
//dùng thêm một lện if để nếu đúng và upload ảnh thành công thì nó gán tên ảnh bằng tên của cái sản phẩn
///=======================
// buoc 2: lay du lieu tren form qua $_POST

if(!empty($_POST)){
$news_title =$_POST['news_title'];
$news_summary=$_POST['news_summary'];
$news_content=$_POST['news_content'];
$news_add_date=date('y-m-d');
//insert dữ liệu từ from vào database
$sql="insert into news (news_title,news_summary,news_content,news_add_date,news_image) value 
('$news_title','$news_summary','$news_content','$news_add_date','$news_image')";

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
				<h3 class="panel-title">Thêm tin</h3>
			</div>
			<div class="panel-body">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
				
					<div class="form-group">
						<label for="news_title">Tiêu đề</label>
						<input type="text" name="news_title" class="form-control" id="news_title" placeholder="tiêu đề" required="">
					</div>
					<div class="form-group">
						<label for="news_summary">tóm tắt</label>
						<input type="text" name="news_summary" class="form-control" id="news_summary" placeholder="tiêu đề" required="">
					</div>
					
					<div class="form-group">
						<label for="$news_image">Ảnh tin</label>
						<input type="file" name="news_image" class="form-control" id="news_image" >
						<input type="hidden" name="news_image" class="form-control" id="news_image" >
					</div>
					
					
					</div>
					<div class="form-group">
						<label for="news_content">Mô Tả</label>
						<textarea name="news_content" id="news" class="form-control" rows="10"></textarea>
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
						
				
					<button type="submit" name="submit" class="btn btn-success">Thêm</button>
					<button type="reset" class="btn btn-danger">Hủy</button>
				</form>
			</div>
		</div>


    </div>
  </div>
</div>