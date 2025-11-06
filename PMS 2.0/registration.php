<!DOCTYPE html><html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Register</title>

	<!-- Custom fonts for this template-->
	<link href="administrator/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="administrator/css/sb-admin-2.min.css" rel="stylesheet">
	
	<!-- My Style(PMS_2.0) -->
	<link href="administrator/css/myStyle.css" rel="stylesheet">
	
</head><body class="bg-dark">

<div class="container">
	<?php
	session_start();
	if (isset($_SESSION['alert'])) {
		echo "<script>alert(\"$_SESSION[alert]\")</script>";
		unset($_SESSION['alert']);
	}
	include 'assets/php/class.php';
	?>

	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0"> <!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1 class="h3 text-gray-900 mt-4">Create an Account!</h1>
				</div>
			</div> <!-- end of 1st row -->
	
			<div class="row">
				<div class="col-sm-10 d-lg-block" style="margin:auto">
					<div class="p-4">
						<form name="register">
							<div id="step1">
								<h1 class="h4 text-gray-900 mb-3 mt-1 text-center">Personal Details (Step 1 of 3)</h1>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<label class="label" for="firstName">First Name</label>
										<input type="text" id="firstName" maxlength="25" class="form-control" placeholder="First Name" onfocusout="v2.req_alphaOnly(this)" value="<?php
										if (isset($_GET['firstName'])) {
											echo $_GET['firstName'];
										}
										?>">
										<label class="red-label" id="firstName_"></label>
									</div>
									<div class="col-sm-6">
										<label class="label" for="middleName">Middle Name (Optional)</label>
										<input type="text" id="middleName" maxlength="25" class="form-control" placeholder="Middle Name" onfocusout="v2.notReq_alphaOnly(this)" value="<?php
										if (isset($_GET['middleName'])) {
											echo $_GET['middleName'];
										}
										?>">
										<label class="red-label" id="middleName_"></label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<label class="label" for="lastName">Last Name</label>
										<input type="text" id="lastName" maxlength="25" class="form-control" placeholder="Last Name" onfocusout="v2.req_alphaOnly(this)" value="<?php
										if (isset($_GET['lastName'])) {
											echo $_GET['lastName'];
										}
										?>">
										<label class="red-label" id="lastName_"></label>
									</div>
									<div class="col-sm-6">
										<label class="label" for="suffix">Suffix (Optional)</label>
										<input type="text" id="suffix" maxlength="25" class="form-control" placeholder="Suffix" onfocusout="v2.notReq_alphaOnly(this)" value="<?php
										if (isset($_GET['suffix'])) {
											echo $_GET['suffix'];
										}
										?>">
										<label class="red-label" id="suffix_"></label>
									</div>
								</div>
								<div class="form-group">
									<label class="label" for="gender">Gender</label>
									<select id="gender" class="form-control" onfocusout="v2.empty_or_default(this)">
									<?php
									if (isset($_GET['gender'])) {
										?>
										<option value="Default">Gender</option>
										<?php
										if ($_GET['gender'] == "Male") {
											?>
										<option value="Male" selected>Male</option>
										<option value="Female">Female</option>
											<?php
										}
										else {
											?>
										<option value="Male">Male</option>
										<option value="Female" selected>Female</option>
											<?php
										}
									}
									else {
										?>
										<option value="Default" selected>Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<?php
									}
									?>
									</select>
									<label class="red-label" id="gender_"></label>
								</div>
								<div class="form-group">
									<label class="label" for="birthDate">Birthday</label>
									<input type="date" id="birthDate" class="form-control" placeholder="Birthday" onfocusout="v2.birthDate(this)" value="<?php
									if (isset($_GET['birthDate'])) {
										echo $_GET['birthDate'];
									}
									?>">
									<label class="red-label" id="birthDate_"></label>
								</div>
								<div class="form-group">
									<label class="label" for="contactNo">Contact Number</label>
									<input type="text" id="contactNo" class="form-control" maxlength="11" placeholder="Contact Number" onfocusout="v2.number(this)" value="<?php
									if (isset($_GET['contactNo'])) {
										echo $_GET['contactNo'];
									}
									?>">
									<label class="red-label" id="contactNo_"></label>
								</div>
							</div>
							<div id="step2" style="display:none">
								<h1 class="h4 text-gray-900 mb-3 mt-1 text-center">Address (Step 2 of 3)</h1>
								<div class="form-group row">
									<div class="col-sm-6">
										<label class="label" for="addressLine1_">Street, Block, Lot #</label>
										<input type="text" id="addressLine1" class="form-control" placeholder="Address Line 1" onfocusout="v2.empty_or_default(this)" value="<?php
										if (isset($_GET['addressLine1'])) {
											echo $_GET['addressLine1'];
										}
										?>">
										<label class="red-label" id="addressLine1_"></label>
									</div>
									<div class="col-sm-6">
										<label class="label" for="addressLine2">Town/Barangay..</label>
										<input type="text" id="addressLine2" class="form-control" placeholder="Address Line 2" onfocusout="v2.empty_or_default(this)" value="<?php
										if (isset($_GET['addressLine2'])) {
											echo $_GET['addressLine2'];
										}
										?>">
										<label class="red-label" id="addressLine2_"></label>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<label class="label" for="city_municipality">City/State</label>
										<input type="text" id="city_municipality" class="form-control" placeholder="City/Municipality" onfocusout="v2.empty_or_default(this)" value="<?php
										if (isset($_GET['city_municipality'])) {
											echo $_GET['city_municipality'];
										}
										?>">
										<label class="red-label" id="city_municipality_"></label>
									</div>
									<div class="col-sm-6">
										<label class="label" for="zipCode">Zip Code</label>
										<input type="text" id="zipCode" class="form-control" maxlength="7" placeholder="Zip Code" onfocusout="v2.number(this)" value="<?php
										if (isset($_GET['zipCode'])) {
											echo $_GET['zipCode'];
										}
										?>">
										<label class="red-label" id="zipCode_"></label>
									</div>
								</div>
								<div class="form-group">
									<label class="label" for="country">Country</label>
									<select id="country" class="form-control" onfocusout="v2.empty_or_default(this)" >
									<?php
									$country = $funk->countryList();
									$x = count($country);
									$y = 0;
									while ($y < $x) {
										if (isset($_GET['country'])) {
											if ($y == 0) {
												?>
										<option value="Default" selected>Select Country</option>
												<?php
											}
											if ($_GET['country'] == $country[$y]) {
												?>
										<option value="<?=$country[$y]?>" selected><?=$country[$y]?></option>
												<?php
											}
											else {
												?>
										<option value="<?=$country[$y]?>"><?=$country[$y]?></option>
												<?php
											}
										}
										else {
											if ($y == 0) {
												?>
										<option value="Default" selected>Select Country</option>
												<?php
											}
											?>
										<option value="<?=$country[$y]?>"><?=$country[$y]?></option>
											<?php
										}
										$y++;
									}
									?>
									</select>
									<label class="red-label" id="country_"></label>
								</div>
							</div>
							<div id="step3" style="display:none">
								<h1 class="h4 text-gray-900 mb-3 mt-1 text-center">Account Details (Step 3 of 3)</h1>
								<div class="form-group">
									<label class="label" for="secretQuestion">Secret Question</label>
									<select id="secretQuestion" class="form-control" onfocusout="v2.empty_or_default(this)">
									<?php
									if (isset($_GET['secretQuestion'])) {
										?>
										<option value="Default">Secret Question</option>
										<?php
										if ($_GET['secretQuestion'] == "What is Your Favorite Food?") {
											?>
										<option value="What is Your Favorite Food?" selected>What is Your Favorite Food?</option>
										<option value="What is Your Favorite Color?">What is Your Favorite Color?</option>
										<option value="What is Your Favorite Subject?">What is Your Favorite Subject?</option>
											<?php
										}
										else if ($_GET['secretQuestion'] == "What is Your Favorite Color?") {
											?>
										<option value="What is Your Favorite Food?">What is Your Favorite Food?</option>
										<option value="What is Your Favorite Color?" selected>What is Your Favorite Color?</option>
										<option value="What is Your Favorite Subject?">What is Your Favorite Subject?</option>
											<?php
										}
										else if ($_GET['secretQuestion'] == "What is Your Favorite Subject?") {
											?>
										<option value="What is Your Favorite Food?">What is Your Favorite Food?</option>
										<option value="What is Your Favorite Color?">What is Your Favorite Color?</option>
										<option value="What is Your Favorite Subject?" selected>What is Your Favorite Subject?</option>
											<?php
										}
									}
									else {
										?>
										<option selected value="Default">Secret Question</option>
										<option value="What is Your Favorite Food?">What is Your Favorite Food?</option>
										<option value="What is Your Favorite Color?">What is Your Favorite Color?</option>
										<option value="What is Your Favorite Subject?">What is Your Favorite Subject?</option>
										<?php
									}
									?>
									</select>
									<label class="red-label" id="secretQuestion_"></label>
								</div>
								<div class="form-group">
									<label class="label" for="secretAnswer">Secret Answer</label>
									<input type="text" id="secretAnswer" maxlength="25" class="form-control" placeholder="Secret Answer" onfocusout="v2.empty_or_default(this)" value="<?php
									if (isset($_GET['secretAnswer'])) {
										echo $_GET['secretAnswer'];
									}
									?>">
									<label class="red-label" id="secretAnswer_"></label>
								</div>
								<div class="form-group">
									<label class="label" for="emailAddress">Email Address</label>
									<input type="email" id="emailAddress" class="form-control" placeholder="Email Address" onfocusout="v2.emailAddress(this)" value="<?php
									if (isset($_GET['emailAddress'])) {
										echo $_GET['emailAddress'];
									}
									?>">
									<label class="red-label" id="emailAddress_"></label>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<label class="label" for="pass1">Password</label>
										<input type="password" id="pass1" maxlength="20" class="form-control" placeholder="Password" onfocusout="v2.password(this)">
										<label class="red-label" id="pass1_"></label>
									</div>
									<div class="col-sm-6">
										<label class="label" for="word">Repeat Password</label>
										<input type="password" id="pass2" maxlength="20" class="form-control" placeholder="Repeat Password" onfocusout="v2.password(this)" />
										<label class="red-label" id="pass2_"></label>
									</div>
								</div>
							</div>
							<input type="button" id="registerButton" class="btn btn-dark btn-block" value="Proceed to Next Step" />
							<hr>
						</form>
						<div class="text-center">
							<a class="small" href="index.php">Already have an account? Login!</a>
						</div>
						<div class="text-center">
							<a class="small" href="forgotPassword.php">Forgot Password?</a>
						</div>
						<div id="goBack_div" class="text-center" style="display:none">
							<a href="#" id="goBack_link" class="small">Go Back</a>
						</div>
					</div> <!-- end of p-4 -->
				</div> <!-- end of col-sm-6 -->
			</div> <!-- end of row -->

		</div> <!-- end of card-body p-0 -->
	</div> <!-- end of card o-hidden -->
</div> <!-- end of container -->

	<script src="administrator/vendor/jquery/jquery.min.js"></script>
	<script src="administrator/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="administrator/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="administrator/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="administrator/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="administrator/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="administrator/vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="administrator/js/demo/datatables-demo.js"></script>
	<script src="administrator/js/demo/chart-area-demo.js"></script>
	<script src="administrator/js/demo/chart-pie-demo.js"></script>
	<script src="administrator/js/demo/chart-bar-demo.js"></script>
	<script src="assets/js/registration.js"></script>

</body></html>
