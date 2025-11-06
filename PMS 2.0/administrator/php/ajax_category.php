<?php
session_start();
if (isset($_POST['categoryId']) && isset($_POST['categoryName'])) {
	$_SESSION['categoryId'] = $_POST['categoryId'];
	$_SESSION['categoryName'] = $_POST['categoryName'];
}
?>