<?php
include 'header.php';
$mysqli = $db->query("select * from user_accounts where accountId like \"$_SESSION[accountId]\"");
if ($mysqli->num_rows > 0) {
	while ($row = $mysqli->fetch_assoc()) {
		break;
	}
}
?>

<section class="main-content">
	<div class="padding">
		<div class="container">

			<div class="about-me">
				<div class="details-top text-center">
					<h2 class="section-title">Profile Page</h2><!-- /.section-title -->
				</div><!-- /.details-top -->
			</div> <!-- /.about-me -->

			<div class="row align-items-stretch">
				<div class="col-sm-12">
					<h3 style="color:blue">Personal Information</h3>
					<hr></hr>
					<div class="form-group row">
						<div class="col-sm-6">
							<h4>Name: <?=$row['firstName']?> <?=$row['lastName']?></h4>
						</div>
						<div class="col-sm-6">
							<h4>Gender: <?=$row['gender']?></h4>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<h4>Birthday: <?=$funk->dateToWord($row['birthDate'])?></h4>
						</div>
						<div class="col-sm-6">
							<h4>Age: <?=$row['age']?></h4>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<h4>Contact: <?=$row['contactNo']?></h4>
						</div>
						<div class="col-sm-6">
							<h4>Address: <?=$row['addressLine1']?> <?=$row['addressLine2']?> <?=$row['city_municipality']?>, <?=$row['country']?> <?=$row['zipCode']?></h4>
						</div>
					</div>
					<h3 style="color:blue">Account Information</h3>
					<hr></hr>
					<?php
					if(!isset($_GET['upload_image'])) {
					?>
					<div class="form-group">
						<img width="20%" height="20%" src="<?=$row['imageSource']?>">
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<h4>
								Profile Image: 
							</h4>
						</div>
						<div class="col-sm-6">
							<h4>
								<a href="profile.php?upload_image=1">Change Profile Image</a>
							</h4>
						</div>
					</div>
					<?php
					}
					else {
					?>
					<form name="imageUpload" action="assets/php/register.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
						<div class="form-group row">
							<div class="col-sm-6">
								<input type="file" name="image" class="form-control" />
							</div>
							<div class="col-sm-6">
								<input class="btn btn-default" type="submit" name="changeProfImage_button" value="Save Image" />
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
								Password: <a href="changePassword.php">Change Password</a>
							</h4>
						</div>
					</div>
				</div> <!-- col -->
			</div> <!-- row -->

		</div> <!-- /.container -->
	</div> <!-- /.padding -->
</section> <!-- /.main-content -->

<?php
include 'footer.php';
?>
