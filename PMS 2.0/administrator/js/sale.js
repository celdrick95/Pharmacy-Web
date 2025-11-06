dateFilter.dateFilter_button.onclick = function() {
	if (dateFrom(dateFilter.date_from)) {
		if (dateTo(dateFilter.date_to)) {
			
			window.location.assign("sale.php?dateFrom=" + date_from + "&dateTo=" + date_to);
		}
	}
}
function dateFrom(x) {
	date_from = new Date(x.value);
	dateNow = new Date();
	if (x.value.length == 0) {
		alert("Choose date from.");
		x.focus();
		return false;
	}
	else if (date_from > dateNow) {
		alert("Invalid date from.");
		x.focus();
		return false;
	}
	return true;
}
function dateTo(x) {
	date_to = new Date(x.value);
	dateNow = new Date();
	if (x.value.length == 0) {
		alert("Choose date to.");
		x.focus();
		return false;
	}
	else if (date_to < date_from) {
		alert("Invalid date to.");
		x.focus();
		return false;
	}
	return true;
}