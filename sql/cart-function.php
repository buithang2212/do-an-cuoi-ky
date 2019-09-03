<?php 
/**
	* Hàm add thực hiện tạo session giỏ hàng và truyền vào tham số
	* $product là thông tin của một sản phẩm lấy theo id 
	* Đang được sử dụng bên file cart.php
*/
function add($product,$quantity = 1){
	// Kiểm tra xem có session cart hay chưa
	if (isset($_SESSION['cart'])) {
		// nếu có thì check tiếp sản phẩm đang add có tồn tại trong cart hay chưa
		// nếu có thì tăng số lượng lên 1
		if (isset($_SESSION['cart'][$product['pro_id']])) {
			$_SESSION['cart'][$product['pro_id']]['quantity'] += 1;
			header("location: cart.php");
		}else{
			// chưa có thì coi như tạp mới một sản phẩm trong cart
			$_SESSION['cart'][$product['pro_id']] = $product;
			$_SESSION['cart'][$product['pro_id']]['quantity'] = $quantity;
			header("location: cart.php");
		}
	}else{
		// chưa có thì coi như tạp mới một sản phẩm trong cart
		$_SESSION['cart'][$product['pro_id']] = $product;
		$_SESSION['cart'][$product['pro_id']]['quantity'] = 1;
		header("location: cart.php");
	}
}


/**
	* Hàm tong_tien thực hiện tính tổng tienf hiện có trong giỏ hang
*/
function tong_tien(){
	$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';
	$tong = 0;
	if ($cart) {
		foreach ($cart as $c) {
			// Công hức: đơn giá * số luọng
			// nếu như sản phẩm có giá sale
			if ($c['sale_price']) {
				$tong += $c['quantity'] * $c['sale_price'];
			}else{
				$tong += $c['quantity'] * $c['price'];
			}
		}
	}

	return $tong;
}

/**
	* Hàm tong_san_pham thực hiện tính tổng số sản phẩm trong giỏ hàng
*/
function tong_san_pham(){
	$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';
	$tong = 0;
	if ($cart) {
		foreach ($cart as $c) {
			$tong += $c['quantity'];
		}
	}

	return $tong;
}

function update($product,$quantity){
	// kiem tra xem so nhap vao co phai la so khong
	$quantity = is_numeric($quantity) ? $quantity : 1;
	$quantity  = $quantity > 0 ? $quantity : 1;
	// Kiểm tra xem có session cart hay chưa
	if (isset($_SESSION['cart'][$product['pro_id']])) {
		$_SESSION['cart'][$product['pro_id']] = $product;
		$_SESSION['cart'][$product['pro_id']]['quantity'] = $quantity;
	}
}
?>