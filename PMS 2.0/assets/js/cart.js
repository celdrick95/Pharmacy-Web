var index;
addToCart.cartButton.onclick = function() {
	if (number(document.addToCart.quantity)) {
		if (confirm("Update Cart?")) {
			window.location.assign("assets/php/add_removeCart.php?quantity=" + addToCart.quantity.value + "&updateCart="+index);
		}
	}
}
function number(x) {
	if (x.value.length == 0) {
		alert("Quantity cannot not be empty.");
		x.focus();
		return false;
	}
	else if (x.value <= 0) {
		alert("Invalid quantity.");
		x.focus();
		return false;
	}
	else if (x.value.match(/^[0-9]+$/)) {
		return true;
	}
}
function displayOnModal(x) {
	index = x, http = new XMLHttpRequest();
	
	http.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			myObj = JSON.parse(this.responseText);
			document.getElementById("modal_title").innerHTML = myObj.productName;
			document.getElementById("modal_image").src = myObj.imageSource;
			document.getElementById("modal_price").innerHTML = "Price: " + myObj.price;
			document.getElementById("modal_stock").innerHTML = "Stock Left: " + myObj.stock + " piece(s).";
			document.getElementById("modal_expiryDate").innerHTML = "Expiry Date: " + myObj.expiryDate;
		}
	};
	http.open("POST", "assets/php/json_cart.php");
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("x="+index);
}