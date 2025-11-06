logIn.logInButton.onclick = function() {
	if (v.emailAddress(logIn.emailAddress)) {
		if (v.password(logIn.password)) {
			window.location.assign("assets/php/logIn_Out.php?emailAddress=" + logIn.emailAddress.value+"&password=" + logIn.password.value+"&logInButton=Customer");
		}
	}
}
var v = new class {
	emailAddress(x) {
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
	password(x) {
		if (x.value.length == 0) {
			alert("Please type your password.");
			x.focus();
			return false;
		}
		return true;
	}
}