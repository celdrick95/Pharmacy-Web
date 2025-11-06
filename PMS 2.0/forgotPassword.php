<!DOCTYPE html><html lang="en"><head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Forgot Password</title>

	<!-- Custom fonts for this template-->
	<link href="administrator/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="administrator/css/sb-admin-2.min.css" rel="stylesheet">

</head><body class="bg-dark">

<div class="container">
	<?php
	session_start();
	if (isset($_SESSION['alert'])) {
		echo "<script>alert(\"$_SESSION[alert]\")</script>";
		unset($_SESSION['alert']);
	}
	?>

	<div class="card o-hidden border-0 shadow-lg my-5"> <!-- Nested Row within Card Body -->
		<div class="card-body p-0">
			<div class="row">
				<div class="col-sm-8 d-sm-block" style="margin:auto">
					<div class="p-4">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
							<p class="mb-4">We get it, stuff happens. Just complete the form below and we'll reset the password for you!</p>
						</div>
						<form name="forgotPassword">
							<h1 class="h4 text-gray-900 mb-3 mt-1 text-center">Account Details</h1>
							<div class="form-group">
								<input type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp" placeholder="Email Address" value="<?php
								if (isset($_GET['emailAddress'])) {
									echo $_GET['emailAddress'];
								}
								?>">
							</div>
							<div class="form-group">
								<select id="secretQuestion" class="form-control">
									<?php
									if (isset($_GET['secretQuestion'])) {
										?>
										<option selected value="Default">Secret Question</option>
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
							</div>
							<div class="form-group">
								<input type="text" id="secretAnswer" maxlength="25" class="form-control" placeholder="Secret Answer" value="<?php
								if (isset($_GET['secretAnswer'])) {
									echo $_GET['secretAnswer'];
								}
								?>">
							</div>
							
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" id="pass1" maxlength="20" class="form-control" placeholder="New Password" />
								</div>
								<div class="col-sm-6">
									<input type="password" id="pass2" maxlength="20" class="form-control" placeholder="Repeat New Password" />
								</div>
							</div>
							<input type="button" id="forgotPasswordButton" class="btn btn-dark btn-block" value="Reset Password" />
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="index.php">Already have an account? Login!</a>
						</div>
						<div class="text-center">
							<a class="small" href="registration.php">Create an Account!</a>
						</div>
						<script>
							forgotPassword.forgotPasswordButton.onclick = function() {
								var x = document.forgotPassword
								if (emailAddress(x.emailAddress)) {
									if (secretQuestion(x.secretQuestion)) {
										if (secretAnswer(x.secretAnswer)) {
											if(password(x.pass1, x.pass2)) {
												if (confirm("Reset password?")) {
													window.location.assign("assets/php/register.php?secretQuestion="+x.secretQuestion.value+"&secretAnswer="+x.secretAnswer.value+"&emailAddress="+x.emailAddress.value+"&pass1="+x.pass1.value+"&forgotPasswordButton=1");
												}
											}
										}
									}
								}
							}
						</script>
					</div> <!-- end of p4 -->
				</div> <!-- end of column -->
			</div> <!-- end of row -->
		</div> <!-- end of card-body -->
	</div> <!-- end of card -->
</div> <!-- end of container -->

	<script src="administrator/vendor/jquery/jquery.min.js"></script>
	<script src="administrator/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/forgotPassword.js" />
	

	<!-- Core plugin JavaScript -->
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

</body></html>