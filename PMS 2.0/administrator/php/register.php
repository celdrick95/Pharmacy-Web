<?php
session_start();
include "../../assets/php/class.php";
$mysqli = $db->query("select * from user_accounts");
if(isset($_GET['registerButton'])) {
	if ($mysqli->num_rows > 0) {
		while ($row = $mysqli->fetch_assoc()) {
			if ($row['emailAddress'] == $_GET['emailAddress']) {
				$_SESSION['alert'] = "Email address already used!";
				header("location: ../registration.php?firstName=$_GET[firstName]&middleName=$_GET[middleName]&lastName=$_GET[lastName]&suffix=$_GET[suffix]&gender=$_GET[gender]&birthDate=$_GET[birthDate]&age=$_GET[age]&contactNo=$_GET[contactNo]&addressLine1=$_GET[addressLine1]&addressLine2=$_GET[addressLine2]&city_municipality=$_GET[city_municipality]&zipCode=$_GET[zipCode]&country=$_GET[country]&secretQuestion=$_GET[secretQuestion]&secretAnswer=$_GET[secretAnswer]&emailAddress=$_GET[emailAddress]");
				exit();
			}
		}
	}
	$encryptedPassword = sha1($_GET['password']);
	$datetime = date("Y-m-d H:i:s");
	$db->query("insert into user_account (firstName, middleName, lastName, suffix, gender, birthDate, age, contactNo, addressLine1, addressLine2, city_municipality, country, zipCode, secretQuestion, secretAnswer, emailAddress, encryptedPassword, userType, dateCreated, imageSource) values (\"$_GET[firstName]\", \"$_GET[middleName]\", \"$_GET[lastName]\", \"$_GET[suffix]\", \"$_GET[gender]\", \"$_GET[birthDate]\",\"$_GET[age]\", \"$_GET[contactNo]\", \"$_GET[addressLine1]\", \"$_GET[addressLine2]\", \"$_GET[city_municipality]\", \"$_GET[zipCode]\", \"$_GET[country]\", \"$_GET[secretQuestion]\", \"$_GET[secretAnswer]\", \"$_GET[emailAddress]\", \"$encryptedPassword\", \"Administrator\", \"$datetime\", \"image/user/koala.jpg\")");
	$_SESSION['alert'] = "Registration Successful!";
	header("location: ../registration.php");
	exit();
}
else if (isset($_POST['profile'])) {
	if ($_FILES['image']['error'] == 0) {
		if (substr($_FILES['image']['type'], 0 , 5) != "image") {
			$_SESSION['alert'] = "Not an image file.";
		}
		else {
			move_uploaded_file($_FILES['image']['tmp_name'], "../../../image/user/".$_FILES['image']['name']);
			$_SESSION['alert'] = "Profile image successfully changed!";
			$db->query("update user_accounts set imageSource = \"image/user/".$_FILES['image']['name']."\" where id like \"$_SESSION[accountId1]\"");
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
	header("location: ../profile.php");
	exit();
}
header("location: ../index.php");
exit();
?>