<?php
session_start();
include "class.php";
if (isset($_GET['addToCart'])) {
	if (isset($_GET['categoryName']) && isset($_GET['productName']) && isset($_GET['price']) && isset($_GET['quantity'])) {
		if (!isset($_SESSION['x']) && !isset($_SESSION['grand_total'])) {
			$_SESSION['x'] = -1;
			$_SESSION['grand_total'] = 0;
		}
		$mysqli = $db->query("select * from product_inventory where productName like \"$_GET[productName]\"");
		$x = -1;
		foreach ($_SESSION['product'] as $y) {
			$x++;
			if ($_SESSION['product'][$x] == $_GET['productName']) {
				$_SESSION['quantity'][$x] += $_GET['quantity'];
				$_SESSION['grand_total'] += $_SESSION['price'][$x] * $_GET['quantity'];
				if ($mysqli->num_rows > 0) {
					while ($row = $mysqli->fetch_assoc()) {
						if ($_SESSION['product'][$x] == $row['product']) {
							if ($_SESSION['quantity'][$x] > $row['stock']) {
								$_SESSION['quantity'][$x] -= $_GET['quantity'];
								$_SESSION['grant_total'] -= $_SESSION['price'][$x] * $_GET['quantity'];
								$_SESSION['alert'] = "Only $row[stock] stock left.";
								header("location: ../../product.php?categoryName=$_SESSION[categoryEnc]&productName=$_SESSION[productEnc]");
								exit();
							}
						}
					}
				}
				$_SESSION['alert'] = "Product Added to Cart!\\n\\nProduct Name: $_GET[productName]\\nCategory: $_GET[categoryName]\\nPrice: $_GET[price]\\nQuantity: $_GET[quantity]";
				header("location: ../../product.php?categoryName=$_SESSION[categoryEnc]&productName=$_SESSION[productEnc]");
				exit();
			}
		}
		if ($mysqli->num_rows > 0) {
			while ($row = $mysqli->fetch_assoc()) {
				if ($_GET['productName'] == $row['productName']) {
					if ($_GET['quantity'] > $row['stock']) {
						$_SESSION['alert'] = "Only $row[stock] stock left.";
						header("location: ../../product.php?categoryName=$_SESSION[categoryEnc]&productName=$_SESSION[productEnc]");
						exit();
					}
				}
			}
		}
		$_SESSION['x']++;
		$_SESSION['product'][$_SESSION['x']] = $_GET['productName'];
		$_SESSION['category'][$_SESSION['x']] = $_GET['categoryName'];
		$_SESSION['price'][$_SESSION['x']] = $_GET['price'];
		$_SESSION['quantity'][$_SESSION['x']] = $_GET['quantity'];
		$_SESSION['grand_total'] += $_SESSION['price'][$_SESSION['x']] * $_GET['quantity'];
		$_SESSION['alert'] = "Product Added to Cart!\\n\\nProduct Name: $_GET[productName]\\nCategory: $_GET[categoryName]\\nPrice: $_GET[price]\\nQuantity: $_GET[quantity]";
	}
	header("location: ../../product.php?categoryName=$_SESSION[categoryEnc]&productName=$_SESSION[productEnc]");
	exit();
}
else if (isset($_GET['updateCart']) || isset($_GET['removeFromCart'])) {
	if (isset($_GET['updateCart'])) {
		$mysqli = $db->query("select * from product_inventory where productName like \"" . $_SESSION['product'][$_GET['updateCart']] . "\"");
		if ($mysqli->num_rows > 0) {
			while ($row = $mysqli->fetch_assoc()) {
				if ($_SESSION['product'][$_GET['updateCart']] == $row['productName']) {
					if ($_GET['quantity'] > $row['stock']) {
						$_SESSION['alert'] = "Only $row[stock] stock left.";
						header("location: ../../cart.php");
						exit();
					}
					
				}
			}
		}
		$_SESSION['grand_total'] -= $_SESSION['quantity'][$_GET['updateCart']] * $_SESSION['price'][$_GET['updateCart']];
		$_SESSION['quantity'][$_GET['updateCart']] = $_GET['quantity'];
		$_SESSION['grand_total'] += $_SESSION['quantity'][$_GET['updateCart']] * $_SESSION['price'][$_GET['updateCart']];
		$_SESSION['alert'] = "Cart Updated!";
	}
	else if (isset($_GET['removeFromCart'])) {
		$_SESSION['grand_total'] -= $_SESSION['price'][$_GET['removeFromCart']] * $_SESSION['quantity'][$_GET['removeFromCart']];
		while ($_GET['removeFromCart'] < $_SESSION['x']) {
			$_SESSION['product'][$_GET['removeFromCart']] = $_SESSION['product'][$_GET['removeFromCart']+1];
			$_SESSION['category'][$_GET['removeFromCart']] = $_SESSION['category'][$_GET['removeFromCart']+1];
			$_SESSION['price'][$_GET['removeFromCart']] = $_SESSION['price'][$_GET['removeFromCart']+1];
			$_SESSION['quantity'][$_GET['removeFromCart']] = $_SESSION['quantity'][$_GET['removeFromCart']+1];
			$_GET['removeFromCart']++;
		}
		if ($_SESSION['grand_total'] == 0) {
			unset($_SESSION['grand_total']);
		}
		unset($_SESSION['product'][$_GET['removeFromCart']]);
		unset($_SESSION['category'][$_GET['removeFromCart']]);
		unset($_SESSION['price'][$_GET['removeFromCart']]);
		unset($_SESSION['quantity'][$_GET['removeFromCart']]);
		$_SESSION['x']--;
		$_SESSION['alert'] = "Product Successfully Removed from the Cart!";
	}
	header("location: ../../cart.php");
	exit();
}
else if (isset($_GET['method_of_payment'])) {
	if (isset($_SESSION['grand_total'])) {
		$x = -1;
		while ($x < $_SESSION['x']) {
			$x++;
			$dateSold = date("Y-m-d");
			$timeSold = date("H:i:s");
			$db->query("insert into sales (productName, productCategory, price, quantity, total, dateSold, timeSold, methodOfPayment) values (\"" . $_SESSION['product'][$x] . "\", \"" . $_SESSION['category'][$x] . "\", \"" . $_SESSION['price'][$x] . "\", \"" . $_SESSION['quantity'][$x] . "\", \"" . $_SESSION['price'][$x] * $_SESSION['quantity'][$x] . "\", \"$dateSold\", \"$timeSold\", \"$_GET[method_of_payment]\")");
			$mysqli = $db->query("select * from product_inventory where productName like \"".$_SESSION['product'][$x]."\"");
			if ($mysqli->num_rows > 0) {
				while ($row = $mysqli->fetch_assoc()) {
					if ($_SESSION['product'][$x] == $row['productName']) {
						$row['stock'] -= $_SESSION['quantity'][$x];
						$db->query("update product_inventory set stock = \"$row[stock]\" where productName like \"".$_SESSION['product'][$x]."\"");
						break;
					}
				}
			}
			unset($_SESSION['product'][$x]);
			unset($_SESSION['category'][$x]);
			unset($_SESSION['price'][$x]);
			unset($_SESSION['quantity'][$x]);
		}
		unset($_SESSION['grand_total']);
		unset($_SESSION['x']);
		$_SESSION['alert'] = "Thank You!\\nYour Order was Succesfully Completed!";
	}
	else {
		$_SESSION['alert'] = "Empty Cart.\\nPlease make an order.";
	}
}
header("location: ../../index.php");
exit();
?>