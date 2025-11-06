var x = 4;
loadMore.onclick = function() {
	var http = new XMLHttpRequest();
	
	http.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementsByClassName("masonry-posts")[0].innerHTML = this.responseText;
			x+=2;
		}
	};
	http.open("POST", "assets/php/ajax_index.php");
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("x="+x);
}