addCategory.addCategory_button.onclick = function() {
	if (v1.empty(addCategory.add_categoryName)) {
		if (confirm("Add New Category?")) {
			window.location.assign("php/process.php?categoryName=" + addCategory.add_categoryName.value + "&categoryButton=" + addCategory.addCategory_button.value);
		}
	}
}
updateCategory.updateCategory_button.onclick = function() {
	if (v1.empty(updateCategory.update_categoryName)) {
		if (confirm("Update Category?")) {
			window.location.assign("php/process.php?categoryName=" + updateCategory.update_categoryName.value + "&categoryButton=" + updateCategory.updateCategory_button.value);
		}
	}
}
function showCategory(categoryId, categoryName) {
	var http = new XMLHttpRequest();
	
	http.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("update_categoryName").value = categoryName;
		}
	};
	http.open("POST", "php/ajax_category.php");
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("categoryId=" + categoryId + "&categoryName=" + categoryName);
}
var v1 = new class {
	empty(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.length == 0) {
			redLabel.innerHTML = x.placeholder + " is required.";
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
	empty(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.length == 0) {
			redLabel.innerHTML = x.placeholder + " is required.";
			redLabel.style.display = "block";
			x.classList.add("box-shadow");
		}
		else {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
	}
}