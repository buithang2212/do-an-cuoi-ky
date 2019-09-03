<?php include( 'header.php') ?>
<?php 
$id = isset($_GET['id']) ? $_GET['id'] : 0 ;

$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
//var_dump($quantity);die();
// buoc 2: khai bao cau truy van
$sql = "Select * from product Where pro_id = $id LIMIT 1";
// buoc 3: thuc hien truy van
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
if ($action == 'add') {
	if ($row) {
		add($row);


	}

}

if ($action == 'delete') {
	if (isset($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
		header("location: cart.php");
	}
}
if ($action == 'update') {
	if ($row) {
		update($row,$quantity);
		header("location: cart.php");
	}

	

}
?>
