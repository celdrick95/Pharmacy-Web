<?php
session_start();
include "class.php";
$mysqli = $db->query("select * from user_accounts");
if(isset($_GET['registerButton'])) {
	if ($mysqli->num_rows > 0) {
		while ($row = $mysqli->fetch_assoc()) {
			if ($row['emailAddress'] == $_GET['emailAddress']) {
				$_SESSION['alert'] = "Email address already used!";
				header("location: ../../registration.php?firstName=$_GET[firstName]&middleName=$_GET[middleName]&lastName=$_GET[lastName]&suffix=$_GET[suffix]&gender=$_GET[gender]&birthDate=$_GET[birthDate]&age=$_GET[age]&contactNo=$_GET[contactNo]&addressLine1=$_GET[addressLine1]&addressLine2=$_GET[addressLine2]&city_municipality=$_GET[city_municipality]&zipCode=$_GET[zipCode]&country=$_GET[country]&secretQuestion=$_GET[secretQuestion]&secretAnswer=$_GET[secretAnswer]&emailAddress=$_GET[emailAddress]");
				exit();
			}
		}
	}
	$encryptedPassword = sha1($_GET['password']);
	$dateCreated = date("Y-m-d H:i:s");
	$db->query("insert into user_accounts (firstName, middleName, lastName, suffix, gender, birthDate, age, contactNo, addressLine1, addressLine2, city_municipality, zipCode, country, secretQuestion, secretAnswer, emailAddress, encryptedPassword, userType, dateCreated, imageSource) values (\"$_GET[firstName]\", \"$_GET[middleName]\", \"$_GET[lastName]\", \"$_GET[suffix]\", \"$_GET[gender]\", \"$_GET[birthDate]\",\"$_GET[age]\", \"$_GET[contactNo]\", \"$_GET[addressLine1]\", \"$_GET[addressLine2]\", \"$_GET[city_municipality]\", \"$_GET[zipCode]\", \"$_GET[country]\", \"$_GET[secretQuestion]\", \"$_GET[secretAnswer]\", \"$_GET[emailAddress]\", \"$encryptedPassword\", \"Customer\", \"$dateCreated\", \"image/user/koala.jpg\")");
	$_SESSION['alert'] = "Registration Successful!";
}
else if (isset($_GET['forgotPasswordButton'])) {
	if(isset($_GET['emailAddress']) && isset($_GET['secretQuestion']) && isset($_GET['secretAnswer'])  && isset($_GET['pass1'])) {
		if ($mysqli->num_rows > 0) {
			while ($row = $mysqli->fetch_assoc()) {
				if ($_GET['emailAddress'] == $row['emailAddress']) {
					$emailAddress_found = true;
					if ($_GET['secretQuestion'] == $row['secretQuestion']) {
						if ($_GET['secretAnswer'] == $row['secretAnswer']) {
							$encryptedPassword = sha1($_GET['pass1']);
							$db->query("update user_accounts set encryptedPassword=\"$encryptedPassword\" where emailAddress like \"$_GET[emailAddress]\"");
							$_SESSION['alert'] = "Your password was successfully been reseted!";
							header("location: ../../index.php");
							exit();
						}
						else {
							$_SESSION['alert'] = "Incorrect Secret Answer!";
						}
					}
					else {
						$_SESSION['alert'] = "Incorrect Secret Question!";
					}
				}
				if ($emailAddress_found != 1) {
					$_SESSION['alert'] = "Empty Database.";
				}
			}
		}
		else {
			$_SESSION['alert'] = "No account in the database!";
		}
		header("location: ../../forgotPassword.php?emailAddress=$_GET[emailAddress]&secretQuestion=$_GET[secretQuestion]&secretAnswer=$_GET[secretAnswer]");
		exit();
	}
}
else if (isset($_GET['changePasswordButton'])) {
	if(!isset($_GET['adminProfile'])) {
		if ($mysqli->num_rows > 0) {
			while ($row = $mysqli->fetch_assoc()) {
				if ($_SESSION['emailAddress'] == $row['emailAddress']) {
					$encryptedPassword = sha1($_GET['password']);
					if ($encryptedPassword == $row['encryptedPassword']) {
						$new_encryptedPassword = sha1($_GET['pass1']);
						$db->query("update user_accounts set encryptedPassword=\"$new_encryptedPassword\" where emailAddress like \"$_SESSION[emailAddress]\"");
						$_SESSION['alert'] = "Password successfully changed!";
						header("location: ../../profile.php");
						exit();
					}
					else {
						$_SESSION['alert'] = "Incorrect Password.";
					}
				}
			}
		}
		header("location: ../../changePassword.php");
		exit();
	}
	else {
		if ($mysqli->num_rows > 0) {
			while ($row = $mysqli->fetch_assoc()) {
				if ($_SESSION['emailAddress1'] == $row['emailAddress']) {
					$encryptedPassword = sha1($_GET['password']);
					if ($encryptedPassword == $row['encryptedPassword']) {
						$new_encryptedPassword = sha1($_GET['pass1']);
						$db->query("update user_accounts set encryptedPassword=\"$new_encryptedPassword\" where emailAddress like \"$_SESSION[emailAddress1]\"");
						$_SESSION['alert'] = "Password successfully changed!";
						header("location: ../../administrator/profile.php");
						exit();
					}
					else {
						$_SESSION['alert'] = "Incorrect Password.";
					}
				}
			}
		}
		header("location: ../../changePassword.php?adminProfile=1");
		exit();
	}
}
else if (isset($_POST['changeProfImage_button'])) {
	if ($_FILES['image']['error'] == 0) {
		if (substr($_FILES['image']['type'], 0 , 5) != "image") {
			$_SESSION['alert'] = "Not an image file.";
		}
		else {
			$_SESSION['imageSource'] = "image/user/".$_FILES['image']['name'];
			$mysqli = $db->query("select * from user_accounts where imageSource like \"$_SESSION[imageSource]\"");
			if ($mysqli->num_rows == 0) {
				move_uploaded_file($_FILES['image']['tmp_name'], "../../".$_SESSION['imageSource']);
			}
			$db->query("update user_accounts set imageSource = \"$_SESSION[imageSource]\" where accountId like \"$_SESSION[accountId]\"");
			$_SESSION['alert'] = "Profile image successfully changed!";
		}
	}
	else if ($_FILES['image']['error'] == 1) {
		$_SESSION['alert'] = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
	}
	else if ($_FILES['image']['error'] == 2) {
		$_SESSION['alert'] = "The uploaded file exceeds the MAX_FILE_SIZE that was specified in the HTML form.";
	}
	else if ($_FILES['image']['error'] == 3) {
		$_SESSION['alert'] = "The uploaded file was only partially uploaded.";
	}
	else if ($_FILES['image']['error'] == 4){
		$_SESSION['alert'] = "No file was uploaded.";
	}
	else if ($_FILES['image']['error'] == 6) {
		$_SESSION['alert'] = "Missing a temporary folder.";
	}
	else if ($_FILES['image']['error'] == 7) {
		$_SESSION['alert'] = "Failed to write file to disk.";
	}
	else if ($_FILES['image']['error'] == 8) {
		$_SESSION['alert'] = "A PHP extension stopped the file upload.";
	}
	header("location: ../../profile.php");
	exit();
}
header("location: ../../index.php");
exit();
?>