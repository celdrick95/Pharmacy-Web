<?php
session_start();
include 'class.php';
if (isset($_POST['x'])) {
	$x = $_POST['x'];
	$myObj = new obj;
	$myObj->productName = $_SESSION['product'][$x];
	$myObj->categoryName = $_SESSION['category'][$x];
	$myObj->price = $funk->toPeso($_SESSION['price'][$x]);
	$myObj->quantity = $_SESSION['quantity'][$x];
	
	$mysqli = $db->query("select * from product_inventory where productName like \"" . $_SESSION['product'][$x] . "\"");
	if ($mysqli->num_rows > 0) {
		while ($row = $mysqli->fetch_assoc()) {
			$myObj->imageSource = $row['imageSource'];
			$myObj->expiryDate = $funk->dateToWord($row['expiryDate']);
			$myObj->stock = $row['stock'];
		}
	}
	
	echo json_encode($myObj);
}
class obj {
}
?>