function ajaxRequest()
{
	try {
		var http = new XMLHttpRequest()
	}
	catch(e1) {
		try {
			http = new ActiveXObject("Msxml2.XMLHTTP")
		}
		catch(e2) {
			try {
				http = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch(e3) {
				http = false
			}
		}
	}
	return http;
}