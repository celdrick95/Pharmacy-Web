<?php
include 'header.php';
$mysqli = $db->query("select sum(total) as today from sales where date(dateSold)=date(now())");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		$today = $row['today'];
	}
}
$mysqli = $db->query("select sum(total) as yesterday from sales where date(dateSold)=date(now())-1");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		$yesterday = $row['yesterday'];
	}
}
$mysqli = $db->query("select sum(total) as this_week from sales where date(dateSold) between date(now())-6 and date(now())");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		$this_week = $row['this_week'];
	}
}
$mysqli = $db->query("select sum(total) as last_week from sales where date(dateSold) between date(now())-13 and date(now())-7");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		$last_week = $row['last_week'];
	}
}
$mysqli = $db->query("select sum(total) as this_month from sales where year(dateSold)=year(now()) and month(dateSold)=month(now())");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		$this_month = $row['this_month'];
	}
}
$mysqli = $db->query("select sum(total) as last_month from sales where year(dateSold)=year(now()) and month(dateSold)=month(now())-1");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		$last_month = $row['last_month'];
	}
}
$mysqli = $db->query("select sum(total) as this_year from sales where year(dateSold)=year(now())");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		$this_year = $row['this_year'];
	}
}
$mysqli = $db->query("select * from product_categories");
$category = $mysqli->num_rows;

$mysqli = $db->query("select * from product_inventory");
$product = $mysqli->num_rows;

$mysqli = $db->query("select * from user_accounts");
$user = $mysqli->num_rows;
?>

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" onclick="alert('Function not ready.')"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
		</div>

		<!-- Content Row 1 -->
		<div class="row">

			<!-- Earnings (Today) Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (Today)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php
							if (isset($today)) {
							?>
								₱ <?=$today?>.00
							<?php
							}
							else {
							?>
								₱ 0.00
							<?php
							}
							?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-2x text-gray-300">₱</i>
						</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3-->

			<!-- Earnings (Yesterday) Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (Yesterday)</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
								if (isset($yesterday)) {
								?>
									₱ <?=$yesterday?>.00
								<?php
								}
								else {
								?>
									₱ 0.00
								<?php
								}
								?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-2x text-gray-300">₱</i>
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3-->

			<!-- Earnings (This Week) Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (This Week)</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
								if (isset($this_week)) {
								?>
									₱ <?=$this_week?>.00
								<?php
								}
								else {
								?>
									₱ 0.00
								<?php
								}
								?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-2x text-gray-300">₱</i>
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3-->

			<!-- Earnings (Last Week) Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (Last Week)</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
								if (isset($last_week)) {
								?>
									₱ <?=$last_week?>.00
								<?php
								}
								else {
								?>
									₱ 0.00
								<?php
								}
								?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-2x text-gray-300">₱</i>
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3-->

			<!-- Earnings (This Month) Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (This Month)</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
								if (isset($last_month)) {
								?>
									₱ <?=$last_month?>.00
								<?php
								}
								else {
								?>
									₱ 0.00
								<?php
								}
								?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-2x text-gray-300">₱</i>
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3-->

			<!-- Earnings (Last Month) Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (Last Month)</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
								if (isset($last_month)) {
								?>
									₱ <?=$last_month?>.00
								<?php
								}
								else {
								?>
									₱ 0.00
								<?php
								}
								?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-2x text-gray-300">₱</i>
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3-->

			<!-- Earnings (This Year) Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (This Year)</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
								if (isset($this_year)) {
								?>
									₱ <?=$this_year?>.00
								<?php
								}
								else {
								?>
									₱ 0.00
								<?php
								}
								?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-2x text-gray-300">₱</i>
							</div>
						</div> <!-- row -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3-->

		</div> <!-- Content Row 1 -->

		<!-- Content Row 2 -->
		<div class="row">

			<!-- Category Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Category</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$category?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div> <!-- row no-gutters -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div> <!-- col-xl-3 -->

			<!-- Product Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Product</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$product?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div> <!-- row no-gutters -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div><!-- col-xl-3 -->

			<!-- Registered User Card -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Registered User</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$user?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
							</div>
						</div> <!-- row no-gutters -->
					</div> <!-- card-body -->
				</div> <!-- card -->
			</div><!-- col-xl-3 -->

		</div> <!-- Content Row 2 -->

	</div><!-- /.container-fluid -->

<?php
	include 'footer.php';
?>