<?php
	include 'header.php';
?>

<section class="main-content">
	<div class="padding">
		<div class="container">

			<div class="contact">
				<div class="contact-details">
					<div class="details-top text-center">
						<h2 class="section-title">Contact</h2><!-- /.section-title -->
					</div><!-- /.details-top -->
					<p class="lead" style="text-align:justify; white-space:pre-wrap">    Contact me for support and inquiry </p>
					<blockquote class="mb-5 lead" style="text-align:left">
						<div class="row widget widget_recent_posts">
							<h3 class="widget-title">Developer</h3> <!-- /.widget-title -->
							<div class="widget-details">
							
								<article class="col-sm-2 post type-post media">
									<div class="entry-thumbnail media-left pull-left">
										<img src="image/user/celdrick.jpg" alt="Thumb Image" />
									</div> <!-- /.entry-thumbnail -->
									<div class="entry-content media-body">
										<h3 class="entry-title">
											<a href="#" onclick="alert('Function not ready')">Celdrick Nheld Madla</a>
										</h3> <!-- /.entry-title -->
										<span class="time">
											<time datetime="2017-12-05">Email: celdrickmadla09@gmail.com<br>Contact: 09771260924</time>
										</span> <!-- /.time -->
									</div> <!-- /.entry-content -->
								</article> <!-- /.post -->

							</div> <!-- /.widget-details -->
						</div> <!-- /.widget -->
					</blockquote>
					<p class="mb-5 lead" style="text-align:justify; white-space:pre-wrap">    For comments and suggestion, please let us know.</p>

					<form action="email.php" method="post" class="wpcf7-form">
					<?php
					if (!isset($_SESSION['accountId']) || !isset($_SESSION['firstname']) || !isset($_SESSION['lastName']) || !isset($_SESSION['emailAddress']) || !isset($_SESSION['encrpyptedPassword']) || !isset($_SESSION['userType'])  || !isset($_SESSION['imageSource'])) {
					?>
						<span class="wpcf7-form-control-wrap your-name">
							<input type="text" name="name" id="name" class="wpcf7-form-control" placeholder="Name" required="" />
						</span>
						<span class="wpcf7-form-control-wrap email">
							<input type="email" name="email" id="email" class="wpcf7-form-control" placeholder="Email Address" required="" />
						</span>
						<span class="wpcf7-form-control-wrap url">
							<input type="url" name="url" id="url" class="wpcf7-form-control" placeholder="Website*" />
						</span>
					<?php
					}
					?>
						<span class="wpcf7-form-control-wrap message">
							<textarea name="message" id="message" class="wpcf7-form-control" placeholder="Your Message" required=""></textarea>
						</span>
						<span class="wpcf7-form-control-wrap submit">
							<input type="submit" name="submit" class="wpcf7-form-control" value="Submit" />
						</span>
					</form>
				</div> <!-- /.contact-details -->
			</div> <!-- /.contact -->

		</div> <!-- /.container -->
	</div> <!-- /.padding -->
</section> <!-- /.main-content -->

<?php
	include 'footer.php';
?>