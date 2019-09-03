<?php 
$id=isset($_GET['id']) ? $_GET['id']:0;
//echo $id;
$sql="update feedback set status = 1 where id_fe=$id";
$res=mysqli_query($conn,$sql);
if ($res) {
header ("location: index.php?module=feedback&action=view&id=$id");
}
 ?>