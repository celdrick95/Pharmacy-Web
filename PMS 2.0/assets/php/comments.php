<?php
session_start();
if (isset($_SESSION['accountId']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName']) && isset($_SESSION['emailAddress']) && isset($_SESSION['encryptedPassword']) && $_SESSION['userType'] == "Customer") {
	include 'class.php';
	if (isset($_POST['postCommentButton']) && isset($_POST['message'])) {
		$dateTimeCommented = date("Y-m-d H:i:s");
		$sql = "insert into user_comments (accountId, name, comment, dateCommented) values ($_SESSION[accountId], \"$_SESSION[firstName] $_SESSION[lastName]\" , \"$_POST[message]\", '$dateTimeCommented')";
		$_SESSION['alert'] = "Comment successfully posted!";
	}
	else if (isset($_GET['removeCommentButton']) && isset($_GET['commentId'])) {
		$sql = "delete from user_comments where tableId like $_GET[commentId]";
		$_SESSION['alert'] = "Comment successfully deleted!";
	}
	$db->query($sql);
}
header("location: ../../product.php?categoryName=$_SESSION[categoryEnc]&productName=$_SESSION[productEnc]");
exit();
?>