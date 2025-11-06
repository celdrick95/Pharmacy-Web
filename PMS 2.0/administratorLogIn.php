<!DOCTYPE html><html lang="en"><head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>

	<!-- Custom fonts for this template-->
	<link href="administrator/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="administrator/css/sb-admin-2.min.css" rel="stylesheet">
	
	<!-- myStyle.css -->
	<link href="administrator/css/myStyle.css" rel="stylesheet">

</head><body class="bg-dark" onload="document.logIn.emailAddress.focus()">

<?php
session_start();
if (isset($_SESSION['alert'])) {
	echo "<script>alert(\"$_SESSION[alert]\")</script>";
	unset($_SESSION['alert']);
}
?>

<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0"> <!-- Nested Row within Card Body -->
			<div class="row justify-content-center">
				<div class="col-lg-6" style="margin:auto">
					<div class="p-4">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Welcome back Administrator!</h1>
						</div>
						<form name="logIn">
							<div class="form-group">
								<label class="label" for="emailAddress">Email Address</label>
								<input type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp" placeholder="Email Address"  onfocusout="v2.emailAddress(this)">
								<label class="red-label" id="emailAddress_"></label>
							</div>
							<div class="form-group">
								<label class="label" for="password">Password</label>
								<input id="password" type="password" class="form-control"  placeholder="Password" onfocusout="v2.password(this)">
								<label class="red-label" id="password_"></label>
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox small">
									<input type="checkbox" class="custom-control-input" id="customCheck">
									<label class="custom-control-label" for="customCheck">Remember Me</label>
								</div>
							</div>
							<input type="button" id="logInButton" class="btn btn-dark btn-block" value=Login />
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="index.php">Get Back to Homepage!</a>
						</div>
						<div class="text-center">
							<a class="small" href="forgot-password.php">Forgot Your Password?</a>
						</div>
					</div> <!-- end of p-4 -->
				</div> <!-- end of column -->
			</div> <!-- end of row -->
		</div> <!-- end of card-body -->
	</div> <!-- end of card -->
</div> <!-- end of container -->

<script src="administrator/vendor/jquery/jquery.min.js"></script>
<script src="administrator/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/administratorlogIn.js" />

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