<?php
	include "../assets/php/class.php";
	session_start();
	if (isset($_SESSION['alert'])) {
		echo "<script>alert(\"$_SESSION[alert]\")</script>";
		unset($_SESSION['alert']);
	}
	
	if (isset($_SESSION['accountId1']) && isset($_SESSION['firstName1']) && isset($_SESSION['lastName1']) && isset($_SESSION['emailAddress1']) && isset($_SESSION['encryptedPassword1']) && $_SESSION['userType1'] == "Administrator" && isset($_SESSION['imageSource1'])) {
		$mysqli = $db->query("select * from user_accounts where accountId like \"$_SESSION[accountId1]\"");
		if ($mysqli->num_rows == 0) {
			$logOutDateTime = date("Y-m-d H:i:s");
			$db->query("update log_in_out set logOut = \"$logOutDateTime\" where emailAddress like \"$_SESSION[emailAddress1]\" and logIn like \"$_SESSION[logInDateTime1]\"");
			unset($_SESSION['accountId1']);
			unset($_SESSION['firstName1']);
			unset($_SESSION['lastName1']);
			unset($_SESSION['emailAddress1']);
			unset($_SESSION['encryptedPassword1']);
			unset($_SESSION['userType1']);
			unset($_SESSION['imageSource1']);
			unset($_SESSION['logInDateTime1']);
			header("location: ../administratorLogIn.php");
		}
	}
	else {
		header("location: ../administratorLogIn.php");
	}
?>
<!DOCTYPE html><html lang="en"><head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>BNB-PMS Content Management System</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	
	<!-- My Style.css -->
	<link href="css/myStyle.css" rel="stylesheet">

</head><body id="page-top">

<!-- Page Wrapper (end tag @ footer.php) -->
<div id="wrapper">

	<!-- Sidebar -->
	<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
			<div class="sidebar-brand-icon">
				<image class="img-round" src="../image/other/logo.png" width="50px">
			</div>
			<div class="sidebar-brand-text mx-3">BNB-PMS Administrator</div>
			
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item">
			<a class="nav-link" href="index.php">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Addons
		</div>

		<!-- Nav Item - Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
				<i class="fas fa-fw fa-users"></i>
				<span>Accounts</span>
			</a>
			<div id="collapse1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Add/View:</h6>
					<a class="collapse-item" href="registration.php">New Administrator</a>
					<a class="collapse-item" href="account.php">Registered Accounts</a>
				</div>
			</div>
		</li>

		<!-- Nav Item - Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
				<i class="fas fa-fw fa-list"></i>
				<span>Product Inventory</span>
			</a>
			<div id="collapse2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Add:</h6>
					<a class="collapse-item" href="category.php">New Category</a>
					<a class="collapse-item" href="product.php">New Product</a>
				</div>
			</div>
		</li>
		
		<!-- Nav Item - Dashboard -->
		<li class="nav-item">
			<a class="nav-link" href="sale.php">
				<i class="fas fa-fw fa-calculator"></i>
				<span>Sales Report</span>
			</a>
		</li>

		<!-- Nav Item  - Activity Log -->
		<li class="nav-item">
			<a class="nav-link" href="log.php">
				<i class="fas fa-fw fa-file"></i>
				<span>Activity Log</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul> <!-- End of Sidebar -->

	<!-- Content Wrapper (end tag @ footer.php) -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content (end tag @ footer.php) -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Topbar Search -->
				<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-dark" type="button" onclick="alert('Function not ready.')">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form>

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">

					<!-- Nav Item - Search Dropdown (Visible Only XS) -->
					<li class="nav-item dropdown no-arrow d-sm-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
							<form class="form-inline mr-auto w-100 navbar-search">
								<div class="input-group">
									<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button" onclick="alert('Function not ready.')">
										<i class="fas fa-search fa-sm"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</li>

					<!-- Nav Item - Alerts -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-bell fa-fw"></i>
							<!-- Counter - Alerts -->
							<span class="badge badge-danger badge-counter">3+</span>
						</a>
						<!-- Dropdown - Alerts -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
							<h6 class="dropdown-header bg-dark">
								Alerts Center
							</h6>
							<a class="dropdown-item d-flex align-items-center" href="#" onclick="alert('Function not ready.')">
								<div class="mr-3">
									<div class="icon-circle bg-primary">
										<i class="fas fa-file-alt text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">August 12, 2019</div>
									<span class="font-weight-bold">A new monthly report is ready to download!</span>
								</div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#" onclick="alert('Function not ready.')">
								<div class="mr-3">
									<div class="icon-circle bg-success">
										<i class="fas fa-donate text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">August 7, 2019</div>
									$290.29 has been deposited into your account!
								</div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#" onclick="alert('Function not ready.')">
								<div class="mr-3">
									<div class="icon-circle bg-warning">
										<i class="fas fa-exclamation-triangle text-white"></i>
									</div>
								</div>
								<div>
									<div class="small text-gray-500">August 2, 2019</div>
									Spending Alert: We've noticed unusually high spending for your account.
								</div>
							</a>
							<a class="dropdown-item text-center small text-gray-500" href="#" onclick="alert('Function not ready.')">Show All Alerts</a>
						</div> <!-- Dropdown - Alerts -->
					</li> <!-- Nav Item - Alerts -->

					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<span class="badge badge-danger badge-counter">7</span>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header bg-dark">
								Message Center
							</h6>
							<a class="dropdown-item d-flex align-items-center" href="#" onclick="alert('Function not ready.')">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="../image/user/celdrick.jpg">
									<div class="status-indicator bg-success"></div>
								</div>
								<div class="font-weight-bold">
									<div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
									<div class="small text-gray-500">Celdrick Nheld Madla � 58m</div>
								</div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#" onclick="alert('Function not ready.')">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="../image/user/celdrick.jpg" />
									<div class="status-indicator"></div>
								</div>
								<div>
									<div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
									<div class="small text-gray-500">Celdrick Nheld Madla � 1d</div>
								</div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#" onclick="alert('Function not ready.')">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="../image/user/celdrick.jpg" />
									<div class="status-indicator bg-warning"></div>
								</div>
								<div>
									<div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
									<div class="small text-gray-500">Celdrick Nheld Madla � 2d</div>
								</div>
							</a>
							<a class="dropdown-item d-flex align-items-center" href="#" onclick="alert('Function not ready.')">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="../image/user/celdrick.jpg" />
									<div class="status-indicator bg-success"></div>
								</div>
								<div>
									<div class="text-truncate">Is it a good pet! The reason I ask is because someone told me that people say this to all snake pet, even if they aren't good...</div>
									<div class="small text-gray-500">Celdrick Nheld Madla � 2w</div>
								</div>
							</a>
							<a class="dropdown-item text-center small text-gray-500" href="#" onclick="alert('Function not ready.')">Read More Messages</a>
						</div>
					</li> <!-- Nav Item - Messages -->

					<div class="topbar-divider d-none d-sm-block"></div>

					<!-- Nav Item - User Information -->
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['firstName1']?> <?=$_SESSION['lastName1']?></span>
							<img class="img-profile rounded-circle" src="../<?=$_SESSION['imageSource1']?>">
						</a>
						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="profile.php">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Profile
							</a>
							<a class="dropdown-item" href="log.php">
								<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
								Activity Log
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Logout
							</a>
						</div> <!-- dropdown-menu -->
					</li> <!-- Nav Item - User Information -->

				</ul> <!-- Topbar Navbar -->
			</nav> <!-- End of Topbar -->