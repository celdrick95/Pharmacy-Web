<?php
session_start();
include "class.php";
if (isset($_GET['logInButton'])) {
	if(isset($_GET['emailAddress']) && isset($_GET['password'])) {
		$mysqli = $db->query("select * from user_accounts where emailAddress like \"$_GET[emailAddress]\"");
		if ($mysqli->num_rows > 0) {
			$encryptedPassword = sha1($_GET['password']);
			while ($row = $mysqli->fetch_assoc()) {
				if ($row['emailAddress'] == $_GET['emailAddress'] && $row['encryptedPassword'] == $encryptedPassword) {
					if ($row['userType'] == "Customer") {
						if ($_GET['logInButton'] == "Customer") {
							$_SESSION['accountId'] = $row['accountId'];
							$_SESSION['firstName'] = $row['firstName'];
							$_SESSION['lastName'] = $row['lastName'];
							$_SESSION['emailAddress'] = $row['emailAddress'];
							$_SESSION['encryptedPassword'] = $encryptedPassword;
							$_SESSION['userType'] = $row['userType'];
							$_SESSION['imageSource'] = $row['imageSource'];
							$_SESSION['logInDateTime'] = date("Y-m-d H:i:s");
							$db->query("insert into log_in_out (emailAddress, logIn, userType) values (\"$row[emailAddress]\", \"$_SESSION[logInDateTime]\", \"Customer\")");
							$_SESSION['alert'] = "Logged in successfully!";
							header("location: ../../index.php");
							exit();
						}
						else {
							$_SESSION['alert'] = "Please use the administrator form!";
						}
					}
					else if ($row['userType'] == "Administrator") {
						if ($_GET['logInButton'] == "Administrator") {
							$_SESSION['accountId1'] = $row['accountId'];
							$_SESSION['firstName1'] = $row['firstName'];
							$_SESSION['lastName1'] = $row['lastName'];
							$_SESSION['emailAddress1'] = $row['emailAddress'];
							$_SESSION['encryptedPassword1'] = $encryptedPassword;
							$_SESSION['userType1'] = $row['userType'];
							$_SESSION['imageSource1'] = $row['imageSource'];
							$_SESSION['logInDateTime1'] = date("Y-m-d H:i:s");
							$db->query("insert into log_in_out (emailAddress, logIn, userType) values (\"$row[emailAddress]\", \"$_SESSION[logInDateTime1]\", \"Administrator\")");
							$_SESSION['alert'] = "Logged in successfully!";
							header("location: ../../administrator/index.php");
							exit();
						}
						else {
							$_SESSION['alert'] = "Please use the administrator form!";
						}
					}				}
				else {
					$_SESSION['alert'] = "Incorrect Email Address or Password!";
				}
			}
		}
		else {
			$_SESSION['alert'] = "Account doesn't exist!";
		}
	}
}
else if (isset($_GET['logOutButton'])) {
	$logOutDateTime = date("Y-m-d H:i:s");
	if ($_GET['logOutButton'] == "Customer") {
		$logInDateTime = $_SESSION['logInDateTime'];
		$emailAddress = $_SESSION['emailAddress'];
		unset($_SESSION['accountId']);
		unset($_SESSION['firstName']);
		unset($_SESSION['lastName']);
		unset($_SESSION['emailAddress']);
		unset($_SESSION['encryptedPassword']);
		unset($_SESSION['userType']);
		unset($_SESSION['imageSource']);
		unset($_SESSION['logInDateTime']);
		$x = -1;
		unset($_SESSION['x']);
		unset($_SESSION['grand_total']);
		if (isset($_SESSION['product'])) {
			foreach ($_SESSION['productName'] as $y) {
				$x++;
				unset($_SESSION['product'][$x]);
				unset($_SESSION['category'][$x]);
				unset($_SESSION['price'][$x]);
				unset($_SESSION['quantity'][$x]);
			}
		}
	}
	else if ($_GET['logOutButton'] == "Administrator") {
		$logInDateTime = $_SESSION['logInDateTime1'];
		$emailAddress = $_SESSION['emailAddress1'];
		unset($_SESSION['accountId1']);
		unset($_SESSION['firstName1']);
		unset($_SESSION['lastName1']);
		unset($_SESSION['emailAddress1']);
		unset($_SESSION['encryptedPassword1']);
		unset($_SESSION['userType1']);
		unset($_SESSION['imageSource1']);
		unset($_SESSION['logInDateTime1']);
	}
	$db->query("update log_in_out set logOut = \"$logOutDateTime\" where emailAddress=\"$emailAddress\" and logIn=\"$logInDateTime\"");
	$_SESSION['alert'] = "Logged out successfully!";
}
header("Location: ../../index.php");
exit();
?>