checkOut.checkOutButton.onclick = function() {
	if (v1.alphaReq(checkOut.firstName)) {
		if (v1.alphaReq(checkOut.lastName)) {
			if (v1.empty_or_default(checkOut.gender)) {
				if (v1.number(checkOut.contactNo)) {
					if (v1.empty_or_default(checkOut.addressLine1)) {
						if (v1.empty_or_default(checkOut.addressLine2)) {
							if (v1.empty_or_default(checkOut.city_municipality)) {
								if (v1.number(checkOut.zipCode)) {
									if (v1.empty_or_default(checkOut.country)) {
										if (v1.radio(checkOut.method_of_payment)) {
											if (confirm("Proceed to Checkout?")) {
												window.location.assign("assets/php/add_removeCart.php?method_of_payment="+checkOut.method_of_payment.value);
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
var v1 = new class {
	alphaReq(x) {
		if (x.value.length == 0 || !x.value.match(/^[A-Za-z]+$/)) {
			if (x.value.length == 0) {
				alert(x.placeholder + " cannot be empty.");
			}
			else if (!x.value.match(/^[A-Za-z]+$/)) {
				alert(x.placeholder + " must have alphabet characters only.");
			}
			x.focus();
			return false;
		}
		return true;
	}
	empty_or_default(x) {
		if (x.value.length == 0 || x.value == "Default") {
			if (x.value.length == 0) {
				alert(x.placeholder + " cannot not be empty.");
			}
			else if (x.value == "Default") {
				alert("Please select from the list.");
			}
			x.focus();
			return false;
		}
		return true;
	}
	number(x) {
		if (x.value.length == 0 || !x.value.match(/^[0-9]+$/)) {
			if (x.value.length == 0) {
				alert(x.placeholder + " can not be empty.");
			}
			else if (x.value.match(/^[0-9]+$/)) {
				alert("Only numberic symbols are allowed");
			}
			x.focus();
			return false;
		}
		return true;
	}
	radio(x) {
		if (x.value.length == 0) {
			alert("Please Select the Payment Method.");
			return false;
		}
		return true;
	}
}
var v2 = new class {
	alphaReq(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.length == 0 || !x.value.match(/^[A-Za-z]+$/)) {
			x.classList.add("box-shadow");
			redLabel.style.display = "block";
			
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " cannot be empty.";
			}
			else if (!x.value.match(/^[A-Za-z]+$/)) {
				redLabel.innerHTML = x.placeholder + " must have alphabet characters only.";
			}
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
	empty_or_default(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.length == 0 || x.value == "Default") {
			x.classList.add("box-shadow");
			redLabel.style.display = "block";
			
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " cannot not be empty.";
			}
			else if (x.value == "Default") {
				redLabel.innerHTML = "Please select from list.";
			}
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
	number(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.length == 0 || !x.value.match(/^[0-9]+$/)) {
			x.classList.add("box-shadow");
			redLabel.style.display = "block";
			
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " can not be empty.";
			}
			else if (!x.value.match(/^[0-9]+$/)) {
				redLabel.innerHTML = "Only numberic symbols are allowed";
			}
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
}