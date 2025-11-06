logIn.logInButton.onclick = function() {
	if (v1.emailAddress(logIn.emailAddress)) {
		if (v1.password(logIn.password)) {
			window.location.assign("assets/php/logIn_Out.php?emailAddress=" + logIn.emailAddress.value+"&password=" + logIn.password.value+"&logInButton=Administrator");
		}
	}
}
var v1 = new class {
	emailAddress(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
			redLabel.style.display = "none";
			return true;
		}
		else if (x.value.length == 0) {
			redLabel.innerHTML = x.placeholder + " is required.";
		}
		else {
			redLabel.innerHTML = "You have entered an invalid email address!";
			
		}
		redLabel.style.display = "block";
		x.focus();
		return false;
	}
	password(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		
		if (x.value.length == 0) {
			redLabel.innerHTML = "Password can not be empty.";
		}
		else if (x.value.length < 7) {
			redLabel.innerHTML = "Password can not be less than 7 characters.";
		}
		else {
			redLabel.style.display = "none";
			return true;
		}
		redLabel.style.display = "block";
		x.focus();
		return false;
	}
}
var v2 = new class {
	emailAddress(x) {
		var redLabel = document.getElementById(x.id + "_");
		redLabel.style.display = "block";
		x.classList.add("box-shadow");
		
		if (x.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
		else if (x.value.length == 0) {
			redLabel.innerHTML = x.placeholder + " is required.";
		}
		else {
			redLabel.innerHTML = "You have entered an invalid email address!";
		}
	}
	password(x) {
		var redLabel = document.getElementById(x.id + "_");
		redLabel.style.display = "block";
		x.classList.add("box-shadow");
		
		if (x.value.length == 0) {
			redLabel.innerHTML = "Password can not be empty.";
		}
		else if (x.value.length < 7) {
			redLabel.innerHTML = "Password can not be less than 7 characters.";
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
}