<?php
session_start();
if (isset($_POST['productId'])) {
	$_SESSION['productId'] = $_POST['productId'];
}
?>