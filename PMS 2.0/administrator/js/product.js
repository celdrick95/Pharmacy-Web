addProduct.addProduct_button.onclick = function() {
	if (v1.empty_or_default(addProduct.add_productName)) {
		if (v1.empty_or_default(addProduct.add_productCategory)) {
			if (v1.number(addProduct.add_price)) {
				if (v1.number(addProduct.add_stock)) {
					if (v1.expiryDate(addProduct.add_expiryDate)) {
						if (v1.empty_or_default(addProduct.add_imageUpload)) {
							if (confirm("Add New Product?")) {
								addProduct.addProduct_submit.click();
							}
						}
					}
				}
			}
		}
	}
}
updateProduct.updateProduct_button.onclick = function() {
	if (v1.empty_or_default(updateProduct.update_productName)) {
		if (v1.empty_or_default(updateProduct.update_productCategory)) {
			if (v1.number(updateProduct.update_price)) {
				if (v1.number(updateProduct.update_stock)) {
					if (v1.expiryDate(updateProduct.update_expiryDate)) {
						if (confirm("Update Product?")) {
							updateProduct.updateProduct_submit.click();
						}
					}
				}
			}
		}
	}
}
function showProduct(productId, productName, productCategory, price, stock, expiryDate, imageSource) {
	var http = new XMLHttpRequest();
	
	http.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementsByName("update_productName")[0].value = productName;
			document.getElementsByName("update_productCategory")[0].value = productCategory;
			document.getElementsByName("update_price")[0].value = price;
			document.getElementsByName("update_stock")[0].value = stock;
			document.getElementsByName("update_expiryDate")[0].value = expiryDate;
			document.getElementById("update_image").src = "../" + imageSource;
		}
	};
	http.open("POST", "php/ajax_product.php");
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("productId=" + productId);
}
var v1 = new class {
	empty_or_default(x) {
		var redLabel = document.getElementById(x.name + "_");
		
		if (x.value.length == 0 || x.value == "Default") {
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " is required.";
			}
			else if (x.value == "Default") {
				redLabel.innerHTML = "Select value from the list.";
			}
		}
		else {
			redLabel.style.display = "none";
			return true;
		}
		redLabel.style.display = "block";
		x.focus();
		return false;
	}
	expiryDate(x) {
		var dateNow = new Date();
		var expiryDate = new Date(x.value);
		
		var redLabel = document.getElementById(x.name + "_");
		
		if (x.value.length == 0 || expiryDate <= dateNow) {
			if (x.value.length == 0) {
				redLabel.innerHTML = "Expiry date is required.";
			}
			else if (expiryDate <= dateNow) {
				redLabel.innerHTML = "Invalid expiry date.";
			}
			redLabel.style.display = "block";
			x.focus();
			return false;
		}
		redLabel.style.display = "none";
		return true;
	}
	number(x) {
		var redLabel = document.getElementById(x.name + "_");
		
		if (!x.value.match(/^[0-9]+$/) || x.value.length == 0) {
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " is required.";
			}
			else {
				redLabel.innerHTML = x.placeholder + " must have numeric characters only.";
			}
			redLabel.style.display = "block";
			x.focus();
			return false;
		}
		else {
			redLabel.style.display = "none";
			return true;
		}
	}
}
var v2 = new class {
	empty_or_default(x) {
		var redLabel = document.getElementById(x.name + "_");
		
		if (x.value.length == 0 || x.value == "Default") {
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " is required.";
			}
			else if (x.value == "Default") {
				redLabel.innerHTML = "Select value from the list.";
			}
			redLabel.style.display = "block";
			x.classList.add("box-shadow");
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
	expiryDate(x) {
		var dateNow = new Date();
		var expiryDate = new Date(x.value);
		
		var redLabel = document.getElementById(x.name + "_");
		
		if (x.value.length == 0 || expiryDate <= dateNow) {
			if (x.value.length == 0) {
				redLabel.innerHTML = "Expiry date is required.";
			}
			else if (expiryDate <= dateNow) {
				redLabel.innerHTML = "Invalid expiry date.";
			}
			redLabel.style.display = "block";
			x.classList.add("box-shadow");
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
	number(x) {
		var redLabel = document.getElementById(x.name + "_");
		
		if (!x.value.match(/^[0-9]+$/) || x.value.length == 0) {
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder +  " is required.";
			}
			else {
				redLabel.innerHTML = x.placeholder + " must have numeric characters only.";
			}
			redLabel.style.display = "block";
			x.classList.add("box-shadow");
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
}