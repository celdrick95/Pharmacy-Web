<!DOCTYPE html><html lang="en"><head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Checkout</title>

	<!-- Custom fonts for this template-->
	<link href="administrator/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="administrator/css/sb-admin-2.min.css" rel="stylesheet">
	
	<!-- My Style -->
	<link href="administrator/css/myStyle.css" rel="stylesheet">

</head><body class="bg-dark">

<?php
session_start();
include 'assets/php/class.php';
$db = $funk->dbConnection();
if (isset($_SESSION['alert'])) {
	echo "<script>alert(\"$_SESSION[alert]\")</script>";
	unset($_SESSION['alert']);
}
if (isset($_SESSION['accountId']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName']) && isset($_SESSION['emailAddress']) && isset($_SESSION['encryptedPassword']) && $_SESSION['userType'] == "Customer") {
	$mysqli = $db->query("select * from user_accounts where accountId like $_SESSION[accountId]");
	if ($mysqli->num_rows > 0) {
		while ($row = $mysqli->fetch_assoc()) {
			break;
		}
	}
}
?>

<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0"> <!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1 class="h3 text-gray-900 mt-4">Checkout!</h1>
				</div>
			</div> <!-- end of 1st row -->
	
			<div class="row" style="margin:auto">
				<div class="col-sm-6 d-lg-block">
					<div class="p-4">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-3 mt-1">Your Order</h1>
						</div>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead align="center">
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
								</thead>
								<tbody align="center">
								<?php
								if (isset($_SESSION['x']) && isset($_SESSION['grand_total'])) {
									$x = 0;
									while ($x <= $_SESSION['x']) {
										?>
									<tr>
										<td><?=$_SESSION['product'][$x]?></td>
										<td><?=$funk->toPeso($_SESSION['price'][$x])?></td>
										<td><?=$_SESSION['quantity'][$x]?></td>
									</tr>
										<?php
										$x++;
									}
								}
								else {
									?>
									<td colspan="3">No Items in Cart</td>
									<?php
								}
								?>
								</tbody>
								<?php
								if (isset($_SESSION['grand_total'])) {
									?>
								<tfoot align="center">
									<th colspan="3">Grand Total: <?=$funk->toPeso($_SESSION['grand_total'])?></th>
								</tfoot>
									<?php
								}
								?>
							</table>
						</div>
					</div> <!-- end of p-4 -->
				</div> <!-- end of col-sm-5 -->
				
				<div class="col-sm-6 d-lg-block">
					<div class="p-4">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-3 mt-1">Billing Details</h1>
						</div>
						<form name="checkOut">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<label for="firstName" class="label">First Name</label>
									<input type="text" id="firstName" maxlength="25" class="form-control" placeholder="First Name" onfocusout="v2.alphaReq(this)" value="<?php
									if (isset($row['firstName'])) {
										echo $row['firstName'];
									}
									?>"
									<?php
									if (isset($row['firstName'])) {
										echo "readonly";
									}
									?>
									>
									<label id="firstName_" class="red-label"></label>
								</div>
								<div class="col-sm-6">
									<label for="lastName" class="label">Last Name</label>
									<input type="text" id="lastName" maxlength="25" class="form-control" placeholder="Last Name" onfocusout="v2.alphaReq(this)" value="<?php
									if (isset($row['lastName'])) {
										echo $row['lastName'];
									}
									?>"
									<?php
									if (isset($row['lastName'])) {
										echo "readonly";
									}
									?>
									>
									<label id="lastName_" class="red-label"></label>
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="label">Gender</label>
								<select id="gender" class="form-control" onfocusout="v2.empty_or_default(this)">
								<?php
								if (isset($row['gender'])) {
									?>
									<option value="Default">Gender</option>
									<?php
									if ($row['gender'] == "Male") {
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
									<option selected value="Default">Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<?php
								}
								?>
								</select>
								<label id="gender_" class="red-label"></label>
							</div>
							<div class="form-group">
								<label for="contactNo" class="label">Contact No.</label>
								<input type="text" id="contactNo" class="form-control" value="<?php
								if(isset($row['contactNo'])) {
									echo $row['contactNo'];
								}
								?>" maxlength="11" placeholder="Contact Number" onfocusout="v2.number(this)" />
								<label id="contactNo_" class="red-label"></label>
							</div>
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-3 mt-4">Billing Address</h1>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label for="addressLine1" class="label">Address Line 1</label>
									<input type="text" id="addressLine1" class="form-control" value="<?php
									if (isset($row['addressLine1'])) {
										echo $row['addressLine1'];
									}
									?>" placeholder="Address Line 1" onfocusout="v2.empty_or_default(this)">
									<label id="addressLine1_" class="red-label"></label>
								</div>
								<div class="col-sm-6">
									<label for="addressLine2" class="label">Address Line 2</label>
									<input type="text" id="addressLine2" class="form-control" value="<?php
									if (isset($row['addressLine2'])) {
										echo $row['addressLine2'];
									}
									?>" placeholder="Address Line 2" onfocusout="v2.empty_or_default(this)">
									<label id="addressLine2_" class="red-label"></label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label for="city_municipality" class="label">Address Line 2</label>
									<input type="text" id="city_municipality" class="form-control" value="<?php
									if (isset($row['city_municipality'])) {
										echo $row['city_municipality'];
									}
									?>" placeholder="City/Municipality" onfocusout="v2.empty_or_default(this)">
									<label id="city_municipality_" class="red-label"></label>
								</div>
								<div class="col-sm-6">
									<label for="zipCode" class="label">Zip Code</label>
									<input type="text" id="zipCode" class="form-control" maxlength="7" value="<?php
									if (isset($row['zipCode'])) {
										echo $row['zipCode'];
									}
									?>" placeholder="Zip Code" onfocusout="v2.number(this)">
									<label id="zipCode_" class="red-label"></label>
								</div>
							</div>
							<div class="form-group">
								<label for="country" class="label">Country</label>
								<select id="country" class="form-control" onfocusout="v2.empty_or_default(this)">
								<?php
								$country = $funk->countryList();
								$x = count($country);
								$y = 0;
								while ($y < $x) {
									if (isset($row['country'])) {
										if ($y == 0) {
											?>
									<option value="Default">Selected Country</option>
											<?php
										}
										if ($row['country'] == $country[$y]) {
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
									<option selected value="Default">Select Country</option>
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
								<label id="country_" class="red-label"></label>
							</div>
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-3 mt-1">Payment Method</h1>
							</div>
							<div class="form-group">
								<input type="radio" name="method_of_payment" value="Cash on Delivery">
								<label for="method_of_payment">Cash on Delivery</label>
							</div>
							<div class="form-group">
								<input type="radio" name="method_of_payment" value="Direct Bank Transfer">
								<label for="method_of_payment">Direct Bank Transfer</label>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<input type="radio" name="method_of_payment" value="Paypal System">
									<label for="method_of_payment">Paypal System</label>
								</div>
								<div class="col-sm-6">
									<img src="image/other/card.jpg" />
								</div>
							</div>
							<hr></hr>
							<div class="form-group">
								<label style="text-align:justify">By Clicking <b>Place Order</b> I Agree that I've read and accept the <a href="#" onclick="alert('Function not ready.')">terms and conditions.</a></label>
							</div>
							<input type="button" id="checkOutButton" class="btn btn-dark btn-block" value="Place Order"/>
							<hr></hr>
							<div class="text-center">
								<a class="small" href="cart.php">Get Back to Cart!</a>
							</div>
							<div class="my-5"></div>
						</form>
					</div> <!-- end of p-4 -->
				</div> <!-- end of col-sm-7 -->

			</div> <!-- end of row -->

		</div> <!-- end of card-body p-0 -->
	</div> <!-- end of card o-hidden -->
</div> <!-- end of container -->
	<script src="assets/js/checkOut.js"></script>
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