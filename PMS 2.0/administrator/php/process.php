<?php
session_start();
include "../../assets/php/class.php";
if (isset($_POST['addProduct_submit']) || isset($_POST['updateProduct_submit']) || isset($_GET['removeProduct_button'])) {
	if (isset($_FILES['add_imageUpload']) || isset($_FILES['update_imageUpload'])) {
		if (isset($_FILES['add_imageUpload'])) { // checks if 'add product' button was clicked
			$file = $_FILES['add_imageUpload'];
			$productName = $_POST['add_productName'];
			$productCategory = $_POST['add_productCategory'];
			$price = $_POST['add_price'];
			$stock = $_POST['add_stock'];
			$expiryDate = $_POST['add_expiryDate'];
		}
		else if (isset($_FILES['update_imageUpload'])) { // checks if 'update product' button was clicked
			$file = $_FILES['update_imageUpload'];
			$productName = $_POST['update_productName'];
			$productCategory = $_POST['update_productCategory'];
			$price = $_POST['update_price'];
			$stock = $_POST['update_stock'];
			$expiryDate = $_POST['update_expiryDate'];
		}
		$dateAdded = date("Y-m-d");
		$imageSource = "image/product/" . $file['name'];
		$productEnc = preg_replace("! !", "+", $productName);
		$error_message = $funk->file_errorMessage($file['error']);
		if ($file['error'] == 0) { // file exists
			if ($funk->file_typeImage($file['type'])) { // checks if the file type is an image
				if (isset($_FILES['add_imageUpload'])) { // Add Product with Image
					$mysqli = $db->query("Select * from product_inventory where productName like \"$productName\"");
					if ($mysqli->num_rows > 0) { // checks existing 'product' and 'imagesource' then updates it
						while ($row = $mysqli->fetch_assoc()) {
							if ($productName == $row['productName']) {
								$stock += $row['stock'];
								if ($imageSource == $row['imageSource']) {
									$sql = "update product_inventory set productCategory=\"$productCategory\", price=\"$price\", stock = \"$stock\", expiryDate=\"$expiryDate\", dateAdded=\"$dateAdded\", productEnc=\"$productEnc\", where productId like \"$row[productId]\"";
								}
								else {
									move_uploaded_file($file['tmp_name'], "../../" . $imageSource);
									$sql = "update product_inventory set productCategory=\"$productCategory\", price=\"$price\", stock=\"$stock\", expiryDate=\"$expiryDate\", dateAdded=\"$dateAdded\", imageSource=\"$imageSource\", productEnc=\"$productEnc\" where productId like \"$row[productId]\"";
								}
								$_SESSION['alert'] = "Product already exist!\\nExisting product updated instead!";
								break;
							}
						}
					}
					else { // Add product with Image
						move_uploaded_file($file['tmp_name'], "../../" . $imageSource);
						$sql = "insert into product_inventory (productName, productCategory, price, stock, expiryDate, dateAdded, imageSource, productEnc) values (\"$productName\", \"$productCategory\", \"$price\", \"$stock\", \"$expiryDate\", \"$dateAdded\", \"$imageSource\", \"$productEnc\")";
						$_SESSION['alert'] = "Product successfully added!";
					}
				}
				else if (isset($_FILES['update_imageUpload'])) { // Update product with Image,
					move_uploaded_file($file['tmp_name'], "../../" . $imageSource);
					$sql = "update product_inventory set productName=\"$productName\", productCategory=\"$productCategory\", price=\"$price\", stock=\"$stock\", expiryDate=\"$expiryDate\", dateAdded=\"$dateAdded\", imageSource=\"$imageSource\", productEnc=\"$productEnc\" where productId like \"$_SESSION[productId]\"";
					$_SESSION['alert'] = "Product successfully updated!";
				}
			}
			else {
				$_SESSION['alert'] = "Not an image file.";
			}
		}
		else if ($file['error'] == 4) { // update product without image
			$sql = "update product_inventory set productName=\"$productName\", productCategory=\"$productCategory\", price=\"$price\", stock=\"$stock\", expiryDate=\"$expiryDate\", dateAdded=\"$dateAdded\", productEnc=\"$productEnc\" where productId like \"$_SESSION[productId]\"";
			$_SESSION['alert'] = "Product successfully updated!";
		}
		else { // other error messages
			echo $errorMessage;
		}
	}
	else if (isset($_GET['removeProduct_button'])) { // Remove product
		$sql = "delete from product_inventory where productId like \"$_GET[removeProduct_button]\"";
		$_SESSION['alert'] = "Product successfully removed!";
	}
	$db->query($sql);
	header("location: ../product.php");
	exit();
}
else if (isset($_GET['categoryButton'])) { // Add and Remove category
	if ($_GET['categoryButton'] == "Add New Category" || $_GET['categoryButton'] == "Update Category") {
		$categoryEnc = preg_replace("! !", "+", $_GET['categoryName']);
		if ($_GET['categoryButton'] == "Add New Category") { // Add Category
			$sql = "insert into product_categories (categoryName, categoryEnc) values (\"$_GET[categoryName]\", \"$categoryEnc\")";
			$_SESSION['alert'] = "Category successfully added!";
		}
		else if ($_GET['categoryButton'] == "Update Category") { // Update Category
			$sql = "update product_categories set categoryName=\"$_GET[categoryName]\", categoryEnc=\"$categoryEnc\" where categoryId like \"$_SESSION[categoryId]\"";
			$mysqli = $db->query("select * from product_inventory where productCategory like \"$_SESSION[categoryName]\"");
			if ($mysqli->num_rows > 0) {
				while ($row = $mysqli->fetch_assoc()) {
					$db->query("update product_inventory set productCategory=\"$_GET[categoryName]\" where productId like \"$row[productId]\"");
				}
			}
			unset($_SESSION['categoryId']);
			unset($_SESSION['categoryName']);
			$_SESSION['alert'] = "Category successfully updated!";
		}
	}
	else if ($_GET['categoryButton'] == "Remove Category") { // Remove Category
		$sql = "delete from product_categories where categoryId like \"$_GET[categoryId]\"";
		$mysqli = $db->query("select * from product_inventory where productCategory like \"$_GET[categoryName]\"");
		if ($mysqli->num_rows > 0) {
			while ($row = $mysqli->fetch_assoc()) {
				$db->query("delete from product_inventory where productId like \"$row[productId]\"");
			}
		}
		$_SESSION['alert'] = "Category successfully removed!";
	}
	$db->query($sql);
	header("location: ../category.php");
	exit();
}
header("location: ../index.php");
exit();
?>