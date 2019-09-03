<?php include'../sql/connect.php' ?>
<?php 
$id=isset($_GET['id']) ? $_GET['id']:0;
$sql="delete from orders where orderid = $id";

 mysqli_query($conn,$sql) ;
 header('location: index.php?module=transaction&list');
	
 ?>