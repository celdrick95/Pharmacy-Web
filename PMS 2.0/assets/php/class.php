<?php
class funk {
	function dbConnection() {
		$db = new mysqli("localhost", "root", "", "pms2.0");
		if ($db->connect_error) {
			die("<font color='red'>Connection failed: ".$db->connect_error."</font>");
		}
		else {
			return $db;
		}
	}
	function dateToWord($date) {
		list($year, $month, $day) = explode("-", $date);
		if ($month == 1) {
			$month = "January";
		}
		else if ($month == 2) {
			$month = "February";
		}
		else if ($month == 3) {
			$month = "March";
		}
		else if ($month == 4) {
			$month = "April";
		}
		else if ($month == 5) {
			$month = "May";
		}
		else if ($month == 6) {
			$month = "June";
		}
		else if ($month == 7) {
			$month = "July";
		}
		else if ($month == 8) {
			$month = "August";
		}
		else if ($month == 9) {
			$month = "September";
		}
		else if ($month == 10) {
			$month = "October";
		}
		else if ($month == 11) {
			$month = "November";
		}
		else if ($month == 12) {
			$month = "December";
		}
		return "$month $day, $year";
	}
	function dateTime_to_word($dateTime) {
		list($year, $month, $day) = explode("-", $dateTime);
		if ($month == 1) {
			$month = "January";
		}
		else if ($month == 2) {
			$month = "February";
		}
		else if ($month == 3) {
			$month = "March";
		}
		else if ($month == 4) {
			$month = "April";
		}
		else if ($month == 5) {
			$month = "May";
		}
		else if ($month == 6) {
			$month = "June";
		}
		else if ($month == 7) {
			$month = "July";
		}
		else if ($month == 8) {
			$month = "August";
		}
		else if ($month == 9) {
			$month = "September";
		}
		else if ($month == 10) {
			$month = "October";
		}
		else if ($month == 11) {
			$month = "November";
		}
		else if ($month == 12) {
			$month = "December";
		}
		list($day, $time) = explode(" ", $day);
		list($hours, $minutes, $seconds) = explode(":", $time);
		if ($hours < 13) {
			$am_pm = "A.M.";
		}
		else {
			$am_pm = "P.M.";
			if ($hours == 13) {
				$hours = 1;
			}
			else if ($hours == 14) {
				$hours = 2;
			}
			else if ($hours == 15) {
				$hours = 3;
			}
			else if ($hours == 16) {
				$hours = 4;
			}
			else if ($hours == 17) {
				$hours = 5;
			}
			else if ($hours == 18) {
				$hours = 6;
			}
			else if ($hours == 19) {
				$hours = 7;
			}
			else if ($hours == 20) {
				$hours = 8;
			}
			else if ($hours == 21) {
				$hours = 9;
			}
			else if ($hours == 22) {
				$hours = 10;
			}
			else if ($hours == 23) {
				$hours = 11;
			}
			else if ($hours == 24) {
				$hours = 12;
			}
		}
		return "$hours:$minutes:$seconds $am_pm $month $day, $year";
	}
	function countryList() {
		$db = self::dbConnection();
		$mysqli = $db->query("select * from country_list");
		if ($mysqli->num_rows > 0) {
			while ($row = $mysqli->fetch_assoc()) {
				$country_list[] = $row['countryName'];
			}
		}
		return $country_list;
	}
	function toPeso($x) {
		return "₱" . $x . ".00";
	}
	function file_errorMessage($x) {
		if ($x == 0) {
			$error_message = true;
		}
		else if ($x == 1) {
			$error_message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
		}
		else if ($x == 2) {
			$error_message = "The uploaded file exceeds the MAX_FILE_SIZE that was specified in the HTML form.";
		}
		else if ($x == 3) {
			$error_message = "The uploaded file was only partially uploaded.";
		}
		else if ($x == 4) {
			$error_message = "No file was uploaded.";
		}
		else if ($x == 6) {
			$error_message = "Missing a temporary folder.";
		}
		else if ($x == 7) {
			$error_message = "Failed to write file to disk.";
		}
		else if ($x == 8) {
			$error_message = "A PHP extension stopped the file upload.";
		}
		return $error_message;
	}
	function file_typeImage($x) {
		if (substr($x, 0 , 5) == "image") {
			return true;
		}
		else {
			return false;
		}
	}
}
$funk = new funk;
$db = $funk->dbConnection();
?>