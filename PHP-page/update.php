<?php 
include'header.php';
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';
if (isset($_POST['update1'])) {
	unset($_POST['update1']);
	//echo "<pre>";
	//print_r($_POST);
	
	var_dump($cart);
	foreach ($_POST as $i => $v) {
		$_SESSION['cart'][$i]['quantity']=$v;
		//var_dump($cart[$i]['quantity']=$v);die();
	}
	
}

 header("location: cart.php")
 ?>