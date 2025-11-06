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

</head><body class="bg-dark" onload="document.forgot.question.focus()">
<?php
session_start();
if (isset($_SESSION['alert'])) {
	echo "<script>alert(\"$_SESSION[alert]\")</script>";
	unset($_SESSION['alert']);
}
if (!isset($_SESSION['accountId']) || !isset($_SESSION['firstName']) || !isset($_SESSION['lastName']) || !isset($_SESSION['emailAddress']) || !isset($_SESSION['encryptedPassword']) || $_SESSION['userType'] != "Customer" && !isset($_SESSION['imageSource']))  {
	header("location: index.php");
}
?>

<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5"> <!-- Nested Row within Card Body -->
		<div class="card-body p-0">
			<div class="row">
				<div class="col-sm-6 d-sm-block" style="margin:auto">
					<div class="p-4">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-2">Change Your Password?</h1>
							<p class="mb-4">We get it, stuff happens. Just complete the form below and we'll change the password for you!</p>
						</div>
						<form name="changePassword">
							<div class="form-group">
								<input type="password" class="form-control" id="password" placeholder="Password">
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" id="pass1" maxlength="20" class="form-control" placeholder="New Password" />
								</div>
								<div class="col-sm-6">
									<input type="password" id="pass2" maxlength="20" class="form-control" placeholder="Repeat New Password" />
								</div>
							</div>
							<?php
							if (!isset($_GET['profile'])) {
							?>
							<input type="button" id="changePasswordButton" class="btn btn-dark btn-block" value="Change Password" onclick="customer_changePassword()" />
							<?php
							}
							else {
							?>
							<input type="button" id="changePasswordButton" class="btn btn-dark btn-block" value="Change Password" onclick="admin_changePassword()" />
							<?php
							}
							?>
						</form>
						<script>
							var x = document.changePassword;
							function customer_changePassword() {
								if (password(x.password)) {
									if(new_password(x.pass1, x.pass2)) {
										if (confirm("Change password?")) {
											window.location.assign("assets/php/register.php?password="+x.password.value+"&pass1="+x.pass1.value+"&changePasswordButton="+x.changePasswordButton.value);
										}
									}
								}
							}
							function admin_changePassword() {
								if (password(x.password)) {
									if(new_password(x.pass1, x.pass2)) {
										if (confirm("Change password?")) {
											window.location.assign("assets/php/register.php?password="+x.password.value+"&pass1="+x.pass1.value+"&changePasswordButton="+x.changePasswordButton.value+"&adminProfile=1");
										}
									}
								}
							}
						</script>
						<hr>
						<div class="text-center">
							<a class="small" href="profile.php">Get Back to Profile!</a>
						</div>
					</div> <!-- end of p4 -->
				</div> <!-- end of column -->
			</div> <!-- end of row -->
		</div> <!-- end of card-body -->
	</div> <!-- end of card -->
</div> <!-- end of container-->

	<script src="assets/js/changePassword.js"></script>

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

</body></html>