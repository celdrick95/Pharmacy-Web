<?php
include 'header.php';
$mysqli = $db->query("select * from user_accounts where accountId like $_SESSION[accountId1]");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		break;
	}
}
?>

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-2 text-gray-800">Profile</h1>
		</div>

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary">Personal Information</h4>
			</div>
			<div class="card-body">
				<div class="row align-items-stretch">
					<div class="col-sm-12">
						<div class="form-group row">
							<div class="col-sm-6">
								<h5 class="m-0">Name: <?=$row['firstName']?> <?=$row['lastName']?></h4>
							</div>
							<div class="col-sm-6">
								<h5 class="m-0">Gender: <?=$row['gender']?></h4>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<h5>Birthday: <?=$row['birthDate']?></h4>
							</div>
							<div class="col-sm-6">
								<h5>Age: <?=$row['age']?></h4>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<h5>Contact: <?=$row['contactNo']?></h4>
							</div>
							<div class="col-sm-6">
								<h5>Address: <?=$row['addressLine1']?> <?=$row['addressLine2']?> <?=$row['city_municipality']?>, <?=$row['country']?> <?=$row['zipCode']?></h4>
							</div>
						</div>
					</div> <!-- col -->
				</div> <!-- row -->
			</div> <!-- card-body -->
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary">Registered Accounts</h4>
			</div>
			<div class="card-body">
			<?php
			if(!isset($_GET['image'])) {
			?>
				<div class="form-group">
					<img width="20%" src="../<?=$row['imageSource']?>">
				</div>
				<div class="form-group row">
					<div class="col-sm-6">
						<h4>
						Profile Image:
						</h4>
					</div>
					<div class="col-sm-6">
						<h4>
							<a href="profile.php?image=1">Change Profile Image</a>
						</h4>
					</div>
				</div>
			<?php
			}
			else {
			?>
				<form name="image" action="db/register.php" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-6">
							<input type="file" name="image" class="form-control" />
						</div>
						<div class="col-sm-6">
							<input class="btn btn-dark" type="submit" name="profile" value="Save Image" />
						</div>
					</div>
				</form>
			<?php
			}
			?>
				<div class="form-group row">
					<div class="col-sm-6">
						<h4>
							Email Address: <?=$row['emailAddress']?>
						</h4>
					</div>
					<div class="col-sm-6">
						<h4>
							Password: <a href="../change-password.php?profile=1">Change Password</a>
						</h4>
					</div>
				</div>
			</div> <!-- .card-body -->
		</div> <!-- .card -->

	</div> <!-- /.container-fluid -->

<?php
	include 'footer.php';
?>