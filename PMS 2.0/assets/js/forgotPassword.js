function secretQuestion(x) {
	if (x.value == "Default") {
		alert("Select a Secret Question.");
		document.forgot.question.focus();
		return false;
	}
	else {
		return true;
	}
}
function secretAnswer(x) {
	if (x.value.length == 0) {
		alert("Please Answer the Secret Question.");
		document.forgot.answer.focus();
		return false;
	}
	return true;
}
function emailAddress(x) {
	if (x.value.length == 0) {
		alert("Please enter an email address.");
		x.focus();
		return false;
	}
	else if (x.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
		return true;
	}
	else {
		alert("You have entered an invalid email address!");
		x.focus();
		return false;
	}
}
function password(password1, password2) {
	if (password1.value.length == 0 || password1.value.length < 7) {
		if (password1.value.length == 0) {
			alert("Passwords cannot be empty.");
		}
		else {
			alert("Minimum length for passwords are 7 characters.");
		}
		document.forgot.pass1.focus();
		return false;
	}
	else if (password2.value.length == 0 || password2.value.length < 7) {
		if (password2.value.length == 0) {
			alert("Passwords cannot be empty.");
		}
		else {
			alert("Minimum length for passwords are 7 characters.");
		}
		document.forgotPassword.pass2.focus();
		return false;
	}
	else if (password1.value != password2.value) {
		alert("Passwords do not match.");
		document.forgotPassword.pass1.focus();
		return false;
	}
	return true;
}