<?php 
$id=isset($_GET['id']) ? $_GET['id']:0;
echo $id;
$sql="update orders set orderstatus = 2 where orderid=$id";
$res=mysqli_query($conn,$sql);
if ($res) {
header ("location: index.php?module=transaction&action=list");
}
 ?>