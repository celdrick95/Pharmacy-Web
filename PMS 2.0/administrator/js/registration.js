var goBack_div = document.getElementById("goBack_div");
var step1 = document.getElementById("step1");
var step2 = document.getElementById("step2");
var step3 = document.getElementById("step3");

register.registerButton.onclick = function() {
	if (register.registerButton.value == "Proceed to Next Step") {
		if (v1.req_alphaOnly(register.firstName)) {
			if (v1.notReq_alphaOnly(register.middleName)) {
				if (v1.req_alphaOnly(register.lastName)) {
					if (v1.notReq_alphaOnly(register.suffix)) {
						if (v1.empty_or_default(register.gender)) {
							if (v1.birthDate(register.birthDate)) {
								if (v1.number(register.contactNo)) {
									register.registerButton.value = "Proceed to Last Step";
									goBack_div.style.display = "block";
									step1.style.display = "none";
									step2.style.display = "block";
								}
							}
						}
					}
				}
			}
		}
	}
	else if (register.registerButton.value == "Proceed to Last Step") {
		if (v1.empty_or_default(register.addressLine1)) {
			if (v1.empty_or_default(register.addressLine2)) {
				if (v1.empty_or_default(register.city_municipality)) {
					if (v1.number(register.zipCode)) {
						if (v1.empty_or_default(register.country)) {
							register.registerButton.value = "Register";
							step2.style.display = "none";
							step3.style.display = "block";
						}
					}
				}
			}
		}
	}
	else if (register.registerButton.value == "Register") {
		if (v1.empty_or_default(register.secretQuestion)) {
			if (v1.empty_or_default(register.secretAnswer)) {
				if (v1.emailAddress(register.emailAddress)) {
					if (v1.password(register.pass1, register.pass2)) {
						if (confirm("Register?")) {
							window.location.assign("php/register.php?firstName="+register.firstName.value+"&middleName="+register.middleName.value+"&lastName="+register.lastName.value+"&suffix="+register.suffix.value+"&gender="+register.gender.value+"&birthDate="+register.birthDate.value+"&age="+v1.age+"&contactNo="+register.contactNo.value+"&addressLine1="+register.addressLine1.value+"&addressLine2="+register.addressLine2.value+"&city_municipality="+register.city_municipality.value+"&zipCode="+register.zipCode.value+"&country="+register.country.value+"&secretQuestion="+register.secretQuestion.value+"&secretAnswer="+register.secretAnswer.value+"&emailAddress="+register.emailAddress.value+"&password="+register.pass1.value+"&registerButton=1");
						}
					}
				}
			}
		}
	}
}
goBack_link.onclick = function() {
	if (register.registerButton.value == "Proceed to Last Step") {
		goBack_div.style.display = "none";
		register.registerButton.value = "Proceed to Next Step";
		step2.style.display = "none";
		step1.style.display = "block";
	}
	else if (register.registerButton.value == "Register") {
		register.registerButton.value = "Proceed to Last Step";
		step3.style.display = "none";
		step2.style.display = "block";
	}
}
var x = function() {
	var obj = {
		fname: 21,
		lname: "arias"
	}
	var objJSON = JSON.stringify(obj);
	
	sessionStorage.setItem("stored", objJSON);
	objJSON = sessionStorage.getItem("stored");
	
	obj = JSON.parse(objJSON);
	alert(objJSON);
}
var v1 = new class {
	constructor() {
		this.age;
	}
	req_alphaOnly(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.match(/^[A-Z a-z]+$/)) {
			redLabel.style.display = "none";
			return true;
		}
		else {
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " is required.";
			}
			else {
				redLabel.innerHTML = x.placeholder + " must have alphabet characters only.";
			}
			redLabel.style.display = "block";
			x.focus();
			return false;
		}
	}
	notReq_alphaOnly(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.match(/^[A-Z a-z]+$/) || x.value.length == 0) {
			redLabel.style.display = "none";
			return true;
		}
		redLabel.innerHTML = x.placeholder + " must have alphabet characters only.";
		redLabel.style.display = "block";
		x.focus();
		return false;
	}
	empty_or_default(x) {
		var redLabel = document.getElementById(x.id + "_");
		
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
	birthDate(x) {
		var year_now = new Date().getFullYear()
		var month_now = new Date().getMonth()
		var date_now = new Date().getDate()
		var my_year = new Date(x.value).getFullYear()
		var my_month = new Date(x.value).getMonth()
		var my_date = new Date(x.value).getDate()
		var validAge = true
		this.age = year_now - my_year
		
		var redLabel = document.getElementById(x.id + "_");
		redLabel.style.display = "block";
		
		if (x.value == "") {
			redLabel.innerHTML = "Birthday is required.";
			validAge = false
			x.focus();
			return false;
		}
		else if (year_now < my_year) {
			redLabel.innerHTML = "Invalid year birth.";
			validAge = false;
			x.focus();
			return false;
		}
		else if (year_now == my_year) {
			if (month_now < my_month || (month_now == my_month && date_now < my_date)) {
				if (month_now < my_month) {
					redLabel.innerHTML = "Invalid month of birth.";
				}
				else if (month_now == my_month && date_now < my_date) {
					redLabel.innerHTML = "Invalid day of birth.";
				}
				validAge = false;
				x.focus();
				return false;
			}
		}
		else if (month_now < my_month) {
			this.age--
		}
		else if (month_now == my_month) {
			if (date_now < my_date) {
				this.age--
			}
		}
		
		if (validAge) {
			if (this.age < 18) {
				if (this.age == 0) {
					if ((month_now - my_month) == 0) {
						redLabel.innerHTML = "You are " + (date_now - my_date) + " day(s) old. Wait until you are 18 years old.";
					}
					else {
						redLabel.innerHTML = "You are " + (month_now - my_month) + " month(s) old. Wait until you are 18 years old.";
					}
				}
				else {
					redLabel.innerHTML = "You are " + this.age + " year(s) old. Wait until you are 18 years old.";
				}
				x.focus();
				return false;
			}
		}
		redLabel.style.display = "none";
		return true;
	}
	number(x) {
		var redLabel = document.getElementById(x.id + "_");
		
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
	emailAddress(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
			redLabel.style.display = "none";
			return true;
		}
		else if (x.value.length == 0) {
			redLabel.innerHTML = x.placeholder + " is required.";
			redLabel.style.display = "block";
		}
		else {
			redLabel.innerHTML = "You have entered an invalid email address!";
			
		}
		redLabel.style.display = "block";
		x.focus();
		return false;
	}
	password(p1, p2) {
		var redLabel1 = document.getElementById(p1.id + "_");
		var redLabel2 = document.getElementById(p2.id + "_");
		
		if (p1.value.length == 0 || p1.value.length < 7) {
			redLabel1.style.display = "block";
			if (p1.value.length == 0) {
				redLabel1.innerHTML = "Password can not be empty.";
			}
			else if (p1.value.length < 7) {
				redLabel1.innerHTML = "Password can not be less than 7 characters.";
			}
			if (p2.value.length != 0) {
				redLabel2.style.display = "none";
			}
			p1.focus();
			return false;
		}
		else if (p2.value.length == 0 || p2.value.length < 7 || p1.value != p2.value) {
			redLabel2.style.display = "block";
			if (p2.value.length == 0) {
				redLabel2.innerHTML = "Password can not be empty.";
			}
			else if (p2.value.length < 7) {
				redLabel2.innerHTML = "Password can not be less than 7 characters.";
			}
			else if (p2.value != p1.value) {
				redLabel2.innerHTML = "Passwords do not match. Please repeat the password carefully.";
			}
			if (p1.value.length != 0) {
				redLabel1.style.display = "none";
			}
			p2.focus();
			return false;
		}
		redLabel2.style.display = "none";
		return true;
	}
}
var v2 = new class {
	req_alphaOnly(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.match(/^[A-Z a-z]+$/)) {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
		else {
			if (x.value.length == 0) {
				redLabel.innerHTML = x.placeholder + " is required.";
			}
			else {
				redLabel.innerHTML = x.placeholder + " must have alphabet characters only.";
			}
			redLabel.style.display = "block";
			x.classList.add("box-shadow");
		}
	}
	notReq_alphaOnly(x) {
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.match(/^[A-Z a-z]+$/) || x.value.length == 0) {
			redLabel.style.display = "none";
			x.classList.remove("box-shadow");
		}
		else  {
			redLabel.innerHTML = x.placeholder + " must have alphabet characters only.";
			redLabel.style.display = "block";
			x.classList.add("box-shadow");
		}
	}
	empty_or_default(x) {
		var redLabel = document.getElementById(x.id + "_");
		
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
	birthDate(x) {
		var year_now = new Date().getFullYear()
		var month_now = new Date().getMonth()
		var date_now = new Date().getDate()
		var my_year = new Date(x.value).getFullYear()
		var my_month = new Date(x.value).getMonth()
		var my_date = new Date(x.value).getDate()
		var age = year_now - my_year
		var validAge = true
		
		var redLabel = document.getElementById(x.id + "_");
		
		if (x.value.length == 0) {
			redLabel.innerHTML = "Birthday is required.";
			validAge = false
		}
		else if (year_now < my_year) {
			redLabel.innerHTML = "Invalid year of birth.";
			validAge = false
		}
		else if (year_now == my_year) {
			if (month_now < my_month || (month_now == my_month && date_now < my_date)) {
				if (month_now < my_month) {
					redLabel.innerHTML = "Invalid month of birth.";
				}
				else if (month_now == my_month && date_now < my_date) {
					redLabel.innerHTML = "Invalid day of birth.";
				}
				validAge = false;
			}
		}
		
		redLabel.style.display = "block";
		x.classList.add("box-shadow");
		
		if (validAge) {
			if (age < 18) {
				if (age == 0) {
					if ((month_now - my_month) == 0) {
						redLabel.innerHTML = "You are " + (date_now - my_date) + " day(s) old. Wait until you are 18 years old.";
					}
					else {
						redLabel.innerHTML = "You are " + (month_now - my_month) + " month(s) old. Wait until you are 18 years old.";
					}
					
				}
				else {
					redLabel.innerHTML = "You are " + age + " year(s) old. Wait until you are 18 years old.";
				}
			}
			else if (age >= 18) {
				redLabel.style.display = "none";
				x.classList.remove("box-shadow");
			}
		}
	}
	number(x) {
		var redLabel = document.getElementById(x.id + "_");
		
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