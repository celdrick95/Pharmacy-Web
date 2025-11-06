<?php
	include 'header.php';
?>

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-2 text-gray-800">Activity Log</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" onclick="alert('Function not ready.')">
				<i class="fas fa-download fa-sm text-white-50"></i> Generate Report
			</a>
		</div>

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Log in</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<th>Log Id</th>
							<th>Email Address</th>
							<th>Log In</th>
							<th>Log Out</th>
							<th>Account Type</th>
						</thead>
						<tfoot>
							<th>Log Id</th>
							<th>Email Address</th>
							<th>Log In</th>
							<th>Log Out</th>
							<th>Account Type</th>
						</tfoot>
						<tbody>
						<?php
						$mysqli = $db->query("select * from log_in_out");
						if ($mysqli->num_rows > 0) {
							while ($row = $mysqli->fetch_assoc()) {
						?>
							<tr>
								<td><?=$row['logId']?></td>
								<td><?=$row['emailAddress']?></td>
								<td><?=$row['logIn']?></td>
								<td><?=$row['logOut']?></td>
								<td><?=$row['userType']?></td>
							</tr>
						<?php
							}
						}
						?>
						</tbody>
					</table>
				</div> <!-- table-responsive -->
			</div> <!-- card-body -->
		</div> <!-- card -->

	</div> <!-- /.container-fluid -->

<?php
	include 'footer.php';
?>