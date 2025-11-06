<?php
session_start();
if (isset($_POST['date_from']) && isset($_POST['date_to'])) {
	$_SESSION['sql'] = "select * from sales where dateSold between \"$_POST[date_from]\" and \"$_POST[date_to]\"";
}
?>