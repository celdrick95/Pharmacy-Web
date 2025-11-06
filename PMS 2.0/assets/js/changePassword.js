function password(x) {
	if (x.value.length == 0) {
		alert("Please enter your password.");
		x.focus();
		return false;
	}
	else if (x.value.length < 7 || x.value.length >12) {
		alert("Password cannot be less than 7 and more than 12 characters.");
		x.focus();
		return false;
	}
	return true;
}
function new_password(p1, p2) {
	if (p1.value.length == 0 || p1.value.length < 7) {
		if (p1.value.length == 0) {
			alert("Please enter your new password");
		}
		else {
			alert("Passwords cannot be less than 7 characters.");
		}
		p1.focus();
		return false;
	}
	else if (p2.value.length == 0 || p2.value.length < 7) {
		if (p2.value.length == 0) {
			alert("Please confirm your new password.");
		}
		else {
			alert("Passwords cannot be less than 7 characters.");
		}
		p2.focus();
		return false;
	}
	else if (p1.value != p2.value) {
		alert("Passwords do not match.");
		p2.focus();
		return false;
	}
	return true;
}