<?php
	include 'header.php';
?>

<section class="banner-slider banner-slider-01 carousel slide">
	<ol class="carousel-indicators">
		<?php
		$mysqli = $db->query("select * from product_categories");
		if ($mysqli->num_rows > 0) {
			$x = 0;
			while($row = $mysqli->fetch_assoc()) {
				$mysqli1 = $db->query("select * from product_inventory where productCategory like \"$row[categoryName]\"");
				if ($mysqli1->num_rows > 0) {
					while($row1 = $mysqli1->fetch_assoc()) {
						if ($x == 0) {
		?>
		<li data-target=".banner-slider-01" data-slide-to="<?=$x?>" class="active"></li>
		<?php
						}
						else {
		?>
		<li data-target=".banner-slider-01" data-slide-to="<?=$x?>"></li>
		<?php
						}
						break;
					}
				}
				$x++;
			}
		}
	?>
		
	</ol>
	<div class="carousel-inner">
		<?php
		$mysqli = $db->query("select * from product_categories");
		if ($mysqli->num_rows > 0) {
			$x = 0;
			while($row = $mysqli->fetch_assoc()) {
				$mysqli1 = $db->query("select * from product_inventory where productCategory like \"$row[categoryName]\"");
				if ($mysqli1->num_rows > 0) {
					while($row1 = $mysqli1->fetch_assoc()) {
						if ($x == 0) {
		?>
		<div class="item active background-bg" data-image-src="<?=$row1['imageSource']?>">
			<article class="post type-post">
				<div class="entry-content">
					<div class="overlay">
						<div class="inner-content">
							<span class="category">
								<a href="productList.php?categoryName=<?=$row['categoryEnc']?>">
									<?=$row['categoryName']?>
								</a>
							</span> <!-- /.category -->
							<h2 class="entry-title">
								<a href="product.php?categoryName=<?=$row['categoryEnc']?>&productName=<?=$row1['productEnc']?>">
									<?=$row1['productName']?>
								</a>
							</h2> <!-- /.entry-title -->
							<a href="product.php?categoryName=<?=$row['categoryEnc']?>&productName=<?=$row1['productEnc']?>" class="btn read-more">Read More</a> <!-- /.btn -->
						</div> <!-- /.inner-content -->
					</div> <!-- /.overlay -->
				</div> <!-- /.entry-content -->
			</article> <!-- /.post -->
		</div> <!-- /.item -->
		<?php
						}
						else {
		?>
		<div class="item background-bg" data-image-src="<?=$row1['imageSource']?>">
			<article class="post type-post">
				<div class="entry-content">
					<div class="overlay">
						<div class="inner-content">
							<span class="category">
								<a href="categoryList.php?categoryName=<?=$row['enc']?>">
									<?=$row['categoryName']?>
								</a>
							</span> <!-- /.category -->
							<h2 class="entry-title">
								<a href="product.php?categoryName=<?=$row['enc']?>&productName=<?=$row1['enc']?>">
									<?=$row1['productName']?>
								</a>
							</h2> <!-- /.entry-title -->
							<a href="product.php?categoryName=<?=$row['enc']?>&productName=<?=$row1['enc']?>" class="btn read-more">Read More</a> <!-- /.btn -->
						</div> <!-- /.inner-content -->
					</div> <!-- /.overlay -->
				</div> <!-- /.entry-content -->
			</article> <!-- /.post -->
		</div> <!-- /.item -->
		<?php
						}
						break;
					}
				}
				$x++;
			}
		}
	?>
	</div> <!-- /.carousel-inner -->
</section> <!-- /.banner-slider -->

<section class="main-content">
	<div class="padding">
		<div class="container">
      <div class="row">
				<div class="col-sm-8">
					<div id="masonry" class="masonry-posts">
					<?php
					$mysqli = $db->query("select * from product_categories limit 2");
					if ($mysqli->num_rows > 0) {
						$x = 0;
						while ($row = $mysqli->fetch_assoc()) {
							$mysqli1 = $db->query("select * from product_inventory where productCategory like \"$row[categoryName]\"");
							if ($mysqli1->num_rows > 0) {
								while($row1 = $mysqli1->fetch_assoc()) {
					?>

						<article class="post type-post col-sm-6">
							<div class="entry-thumbnail">
								<img height="170px" width="170px" src="<?=$row1['imageSource']?>" alt="Thumbnail Image">
							</div> <!-- /.entry-thumbnail -->
							<div class="entry-content">
								<span class="category">
									<a href="productList.php?categoryName=<?=$row['categoryEnc']?>">
										<?=$row['categoryName']?>
									</a>
								</span> <!-- /.category -->
								<h2 class="entry-title">
									<a href="product.php?categoryName=<?=$row['categoryEnc']?>&productName=<?=$row1['productEnc']?>">
										<?=$row1['productName']?>
									</a>
								</h2> <!-- /.entry-title -->
								<p>
									All about <?=$row1['productName']?>.
								</p>
								<a href="product.php?categoryName=<?=$row['categoryEnc']?>&productName=<?=$row1['productEnc']?>" class="btn">Read more</a> <!-- /.btn -->
							</div> <!-- /.entry-content -->
						</article> <!-- /.post -->

									<?php
									break;
								}
							}
							$x++;
						}
					}
					?>

					</div> <!-- /.masonry-posts -->
          
					<div class="btn-container">
						<a id="loadMore" class="btn load-more">Load more</a>
					</div><!-- /.btn-container -->

				</div> <!-- col-sm-8 -->

				<div class="col-sm-4">
					<aside class="sidebar text-center">
            
						<div class="widget widget_newsletter">
							<h3 class="widget-title">Newsletter</h3> <!-- /.widget-title -->
							<div class="widget-details">
								<form class="mc4wp-form" method="post">
									<div class="mc4wp-form-fields">
										<input class="form-control" type="email" name="EMAIL" placeholder="Email Address" required="" />
										<input type="submit" class="form-control" name="submit" value="Subscribe" />
									</div>
									<div class="mc4wp-response"></div>
								</form>
							</div> <!-- /.widget-details -->
						</div> <!-- /.widget -->

						<div class="widget widget_insta_feed">
							<h3 class="widget-title">Products</h3><!-- /.widget-title -->
							<div class="widget-details">
							<?php
							$mysqli = $db->query("select * from product_categories");
							if ($mysqli->num_rows > 0) {
								while ($row = $mysqli->fetch_assoc()) {
									$mysqli1 = $db->query("select * from product_inventory where productCategory like \"$row[categoryName]\"");
									if ($mysqli1->num_rows > 0) {
										while($row1 = $mysqli1->fetch_assoc()) {
							?>
							<a href="#">
								<img src="<?=$row1['imageSource']?>" alt="Instagram Image"/>
							</a>
									<?php
									break;
										}
									}
								}
							}
							?>

							</div><!-- /.widget-details -->
						</div><!-- /.widget -->
						
					</aside> <!-- /.sidebar -->
          
				</div> <!-- col-sm-4 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.padding -->
</section> <!-- /.main-content -->

<script src="assets/js/index.js"></script>
<?php
	include 'footer.php';
?>