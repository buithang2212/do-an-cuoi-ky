
<?php include'../sql/connect.php'; ?>
<?php 

$id =isset($_GET['id']) ? $_GET['id'] :0;
$sql="select *from news where news_id= $id";
$res_new=mysqli_query($conn,$sql);
$row_news=mysqli_fetch_assoc($res_new);




 ?>

 <div class="col-md-10">
 	<div>
 	<h2><?php echo $row_news['news_title']; ?></h2>
 </div>
<div >
	<h4><b><?php echo $row_news['news_summary']; ?></b></h4>
</div>	
<div>
	<?php echo $row_news['news_content']; ?>
</div>

		
			<div ><?php if ($row_news['news_status']==0) {?>
				
			
					<a href="index.php?module=news&action=list" class="btn btn-default">| Quay lại | </a>
					<a href="index.php?module=news&action=edit&id=<?php echo $id; ?> " class="btn btn-default">sửa |</a>
					<a href="index.php?module=news&action=delete&id=<?php echo $id ?>" class="btn btn-default" onclick="return confirm('Ban co chac muon xoa ?')">Xóa |</a>
					<a href="index.php?module=news&action=confirm&id=<?php echo $id ?>" class="btn btn-default" style="color: red;">| Công khai | </a>
				<?php }else{ ?>

					<a href="index.php?module=news&action=list" class="btn btn-default">| Quay lại | </a>
					<a href="index.php?module=news&action=edit&id=<?php echo $id; ?> " class="btn btn-default">sửa |</a>
					<a href="index.php?module=news&action=delete&id=<?php echo $id ?>" class="btn btn-default" onclick="return confirm('Ban co chac muon xoa ?')">Xóa |</a>
					<?php } ?>
			</div>
				
	
 		
 	
 </div>
 </div>
 </div>