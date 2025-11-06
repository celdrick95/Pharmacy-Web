<?php
	include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-2 text-gray-800">View Registered Accounts</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" onclick="alert('Function not ready.')">
			<i class="fas fa-download fa-sm text-white-50"></i> Generate Report
		</a>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">User Accounts</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<th>Profile Image</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Contact</th>
						<th>Email Address</th>
						<th>Account Type</th>
						<th>Date Created</th>
					</thead>
					<tfoot>
						<th>Profile Image</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Contact</th>
						<th>Email Address</th>
						<th>Account Type</th>
						<th>Date Created</th>
						</tfoot>
					<tbody>
						<?php
						$mysqli = $db->query("select * from user_accounts");
						if ($mysqli->num_rows > 0) {
							while ($row = $mysqli->fetch_assoc()) {
						?>
						<tr>
							<td><img class="img-rounded" height="90px" width="90px" src="../<?=$row['imageSource']?>" ></img></td>
							<td><?=$row['firstName']?> <?=$row['middleName']?> <?=$row['lastName']?> <?=$row['suffix']?></td>
							<td><?=$row['gender']?></td>
							<td><?=$row['age']?></td>
							<td><?=$row['contactNo']?></td>
							<td><?=$row['emailAddress']?></td>
							<td><?=$row['userType']?></td>
							<td><?=$funk->dateTime_to_word($row['dateCreated'])?></td>
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