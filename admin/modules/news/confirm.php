<?php 
$id=isset($_GET['id']) ? $_GET['id']:0;
//echo $id;
$sql="update news set news_status = 1 where news_id=$id";
$res=mysqli_query($conn,$sql);
if ($res) {
header ("location: index.php?module=news&action=list");
}
 ?>