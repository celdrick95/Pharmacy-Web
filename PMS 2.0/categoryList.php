<?php
	include 'header.php';
?>

<section class="main-content">
	<div class="padding">
		<div class="container">
			<div class="row">
				<div class="categories text-center">
					<div class="details-top">
						<h2 class="section-title">Categories</h2> <!-- /.section-title -->
					</div> <!-- /.details-top -->

					<?php 
					$mysqli = $db->query("select * from product_categories");
					if ($mysqli->num_rows > 0) {
						while ($row = $mysqli->fetch_assoc()) {
							$mysqli1 = $db->query("select * from product_inventory where productCategory like \"$row[categoryName]\"");
							if ($mysqli1->num_rows > 0) {
								while($row1 = $mysqli1->fetch_assoc()) {
					?>
					<div class="col-sm-4">
						<article class="post type-post">
							<div class="entry-thumbnail">
								<img class="img-rounded" src="<?=$row1['imageSource']?>" height="200px"  width="200px" alt="Thumbnail Image" />
							</div> <!-- /.entry-thumbnail -->
							<div class="entry-content">
								<span class="category">
									<a href="productList.php?categoryName=<?=$row['categoryEnc']?>">
										<?=$row['categoryName']?>
									</a>
								</span> <!-- /.category -->
								<p>
									All about <?=$row['categoryName']?>
								</p>
								<a href="productList.php?categoryName=<?=$row['categoryEnc']?>" class="btn">
									Read more
								</a> <!-- /.btn -->
							</div> <!-- /.entry-content -->
						</article> <!-- /.post -->
					</div> <!-- end of col-sm-4-->
					<?php
						break;
								}
							}
						}
					}
					?>

				</div> <!-- /.categories -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.padding -->
</section> <!-- /.main-content -->

<?php
	include 'footer.php';
?>