<?php
	include 'header.php';
	$mysqli = $db->query("select * from product_categories where categoryName like \"$_GET[categoryName]\"");
	if ($mysqli->num_rows > 0) {
		while ($row = $mysqli->fetch_assoc()) {
			$_SESSION['categoryEnc'] = $row['categoryEnc'];
			$mysqli1 = $db->query("select * from product_inventory where productName like \"$_GET[productName]\"");
			if ($mysqli1->num_rows > 0) {
				while ($row1 = $mysqli1->fetch_assoc()) {
					$_SESSION['productEnc'] = $row1['productEnc'];
					break;
				}
			}
			break;
		}
	}
?>

<section class="main-content">
	<div class="padding">
		<div class="container">
			<div class="row">

				<div class="col-sm-12">
					<div class="single-post">
						<div class="video-post">
							<article class="post type-post">
								<div class="entry-thumbnail" style="text-align:center">
									<img class="img-rounded" src="<?=$row1['imageSource']?>" width="200" height="200" allowfullscreen="" />
								</div> <!-- /.entry-thumbnail -->

								<div class="entry-content">
									<div class="top-content text-center">
										<span class="category">
											<a href="productList.php?categoryName=<?=$row['categoryEnc']?>"><?=$row['categoryName']?></a>
										</span> <!-- /.category -->
										<h2 class="entry-title">
											<a href="product.php?categoryName=<?=$row['categoryEnc']?>&productName=<?=$row1['productEnc']?>">
												<?=$row1['productName']?>
											</a>
										</h2> <!-- /.entry-title -->
										
										<span class="time">
											<time datetime="">Expiry Date: <?=$funk->dateToWord($row1['expiryDate'])?></time>
										</span> <!-- /.time -->
										<br>
										<span class="time">
											<time datetime="">Stock left: <?=$row1['stock']?> piece(s).</time>
										</span> <!-- /.time -->
										<br>
										<span class="time">
											<time datetime="<?=$row1['dateAdded']?>"><?=$funk->toPeso($row1['price'])?></time>
										</span> <!-- /.time -->
										
									</div> <!-- /.top-content -->

									<form name="productPage" class="wpcf7-form justify-content-center">
										<span class="wpcf7-form-control-wrap submit">
											<input type="number" id="quantity" class="wpcf7-form-control" placeholder="Quantity" required="" style="width:27%" />
										</span>
										<span class="wpcf7-form-control-wrap submit">
											<input type="button" id="addToCart" class="btn wpcf7-form-control" value="Add to Cart" style="width:27%" />
										</span>
									</form>
									<script>
										productPage.addToCart.onclick = function() {
											if (quantity(document.productPage.quantity)) {
												if (confirm("Add to Cart?")) {
													window.location.assign("assets/php/add_removeCart.php?categoryName=<?=$row['categoryEnc']?>&productName=<?=$row1['productEnc']?>&price=<?=$row1['price']?>&quantity="+document.productPage.quantity.value+"&addToCart=1");
												}
											}
										}
										function quantity(x) {
											if (x.value.length == 0) {
												alert("Quantity cannot not be empty.");
												document.productPage.quantity.focus();
												return false;
											}
											else if (x.value <= 0) {
												alert("Invalid quantity.");
												document.productPage.quantity.focus();
												return false;
											}
											else if (x.value.match(/^[0-9]+$/)) {
												return true;
											}
										}
									</script>

									<h3 style="color:blue">Product Details</h3>
									<h4>Generic Name</h4>
									<p>
										Diphenhydramine HCI<br>Phenylpropanolamine HCI
									</p>
									<h4>Brand Name</h4>
									<p>
										<?=$row1['productName']?>
									</p>
									<h4>Format</h4>
									<p>
										Syrup
									</p>
									<h3 style="color:blue">What is the medicine used for?</h3>
									<p style="text-align:justify">
										This medicine is used for the relief of cough, clogged nose, runny nose, postnasal drip, sneezing, and itchy and watery eyes associated with the common cold, allergic rhinitis, sinusitis, flu, and other mirror respiratory tract infections. It also helps decongest sinus openings and passages.
									</p>
									<h3 style="color:blue">What is in the medicine?</h3>
									<p>
										Each 5mL (1 teaspoonful) Syrup contains:
									</p>
									<table class="table">
										<td>Diphenhydramine HCI<td>12.5 mg<tr>
										<td>Phenylpropanolamine HCI<td>12.5 mg
									</table>
									<p style="text-align:justify">
										This medicine contains diphenhydramine HCI and phenylpropanolamine HCI. Diphenhydramine HCI, a cough supressant (antitussive), acts centrally by depressing the cough center in the medulla of the brain and therefore elevates the threshold for coughing. Diphenhydramine HCI is also a sedating antihistamine which diminishes allergic symptoms by blocking histamine receptors.
									</p>
									<p>
										Phenylpropanolamine HCI, a nasal decongestant, clears obstructed and congested air passages making breathing easier.
									</p>

									<?php
									$mysqli = $db->query("select * from user_comments");
									while ($row = $mysqli->fetch_assoc()) {
										$mysqli1 = $db->query("select * from user_accounts where accountId like $row[accountId]");
										if ($mysqli1->num_rows == 0) {
											$db->query("delete from user_comments where accountId like $row[accountId]");
										}
									}
									$mysqli = $db->query("select * from user_comments");
									if ($mysqli->num_rows > 0) {
									?>
									<div class="post-meta">
										<span class="comments pull-left">
											<i class="icon_comment_alt"></i>
											<a href="#">
												<?=$mysqli->num_rows?> Comment(s)
											</a>
										</span> <!-- /.comments -->
										<span class="post-social pull-right">
											<a href="#" onclick="alert('Function not ready')">
												<i class="fa fa-instagram"></i>
											</a>
											<a href="#" onclick="alert('Function not ready')">
												<i class="fa fa-facebook"></i>
											</a>
											<a href="#" onclick="alert('Function not ready')">
												<i class="fa fa-twitter"></i>
											</a>
											<a href="#" onclick="alert('Function not ready')">
												<i class="fa fa-pinterest-p"></i>
											</a>
										</span> <!-- /.post-social -->
									</div> <!-- /.post-meta -->

								</div> <!-- /.entry-content -->
							</article> <!-- /.post -->
						</div> <!-- /.video-post -->

						<div class="author-bio media">
							<div class="author-avatar media-left pull-left">
								<img class="img-circle" src="image/user/celdrick.jpg" alt="Avatar">
							</div> <!-- /.author-avatar -->
							<div class="author-details media-body">
								<h3 class="name">
									<a href="#">Celdrick Nheld Madla</a>
								</h3>
								<p>
									Reference:<br><a href="#" style="text-decoration:underline; font-style:italic" onclick="alert('Oops.')">https://www.unilab.com.ph/products/<?=$row1['productEnc']?></a>
								</p>
								<div class="social">
									<a href="#" onclick="alert('Function not ready')">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#" onclick="alert('Function not ready')">
										<i class="fa fa-pinterest-p"></i>
									</a>
									<a href="#" onclick="alert('Function not ready')">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="#" onclick="alert('Function not ready')">
										<i class="fa fa-google-plus"></i>
									</a>
									<a href="#" onclick="alert('Function not ready')">
										<i class="fa fa-instagram"></i>
									</a>
								</div> <!-- /.social -->
							</div> <!-- /.author-details -->
						</div> <!-- /.author-bio -->

						<div class="comments text-center">
							<h3 class="comment-title">
								<?=$mysqli->num_rows?> comment(s)
							</h3> <!-- /.comment-title -->
							<ul class="comment-list">
									<?php
										while ($row = $mysqli->fetch_assoc()) {
											$mysqli1 = $db->query("select * from user_accounts where accountId like \"$row[accountId]\"");
											while ($row1 = $mysqli1->fetch_assoc()) {
												break;
											}
									?>
								<li class="comment parent media">
									<div class="author-avatar media-left pull-left">
										<img class="img-circle" src="<?=$row1['imageSource']?>" alt="Avatar">
									</div> <!-- /.author-avatar -->
									<div class="comment-details media-body">
										<h3 class="name">
											<a href="#">
												<?=$row['name'];?>
											</a>
										</h3>
										<p>
											<?=$row['comment']?>
										</p>
									<?php
											if (isset($_SESSION['accountId'])) {
												if ($_SESSION['accountId'] == $row['accountId']) {
									?>
										<a href="assets/php/comments.php?commentId=<?=$row['tableId']?>&removeCommentButton=1" onclick="return confirm('Delete comment?')" class="btn reply">Remove</a>
									<?php
												}
											}
									?>
										<time datetime="PT04H0M">
											<?=$funk->dateTime_to_word($row['dateCommented'])?>
										</time>
									</div> <!-- /.comment-details -->
								</li> <!-- /.comment parent media -->
									<?php
										}
									}
									?>
							</ul> <!-- /.comment-list -->
						</div> <!-- /.comments -->



						<?php
						if (isset($_SESSION['accountId'])) {
						?>
						<div class="respond text-center">
							<h3 class="respond-title">Leave a reply</h3> <!-- /.respond-title -->
							<form method="post" action="assets/php/comments.php" class="comment-form" onsubmit="return confirm('Post comment?')">
								<span class="comment-form-control-wrap message">
									<textarea name="message" class="comment-form-control" placeholder="Your Message" required=""></textarea>
								</span>
								<span class="comment-form-control-wrap submit">
									<input type="submit" name="postCommentButton" class="comment-form-control" value="Post Comment" />
								</span>
							</form>
						<?php
						}
						?>
						</div> <!-- /.respond -->

					</div> <!-- /.single-post -->
				</div> <!-- end of col-sm-12 -->
			</div> <!-- end of row -->
		</div> <!-- /.container -->
	</div> <!-- /.padding -->
</section> <!-- /.main-content -->

<?php
	include 'footer.php';
?>