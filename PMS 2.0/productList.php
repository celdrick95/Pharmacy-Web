<?php
include "header.php";
?>

	<section class="main-content">
	<div class="padding">
		<div class="container">
			<div class="details-top">
			<h2 class="section-title"><?=$_GET['categoryName']?></h2> <!-- /.section-title -->
			</div> <!-- /.details-top -->
			<div class="list-posts-02">
				<?php
				$mysqli = $db->query("select * from product_categories where categoryName like \"$_GET[categoryName]\"");
				if ($mysqli->num_rows > 0) {
					while ($row = $mysqli->fetch_assoc()) {
						$mysqli1 = $db->query("select * from product_inventory where productCategory like \"$row[categoryName]\"");
						if ($mysqli1->num_rows > 0) {
							while ($row1 = $mysqli1->fetch_assoc()) {
							?>
					<article class="post type-post media">
						<div class="entry-thumbnail media-left pull-left">
							<img src="<?=$row1['imageSource']?>" height="200px" width="200px" alt="Thumbnail Image">
						</div> <!-- /.entry-thumbnail -->
						<div class="entry-content media-body">
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
							<span class="time">
								<time datetime="2019-12-03">₱ <?=$row1['price']?>.00</time>
							</span> <!-- /.time -->
							<p>
								Expiry Date: <?=$funk->dateToWord($row1['expiryDate'])?><br>
								Stock left: <?=$row1['stock']?> pieces.
							</p>
							<a href="product.php?categoryName=<?=$row['categoryEnc']?>&productName=<?=$row1['productEnc']?>" class="btn">Read more</a> <!-- /.btn -->
						</div> <!-- /.entry-content -->
					</article> <!-- /.post -->
							<?php
							}
						}
					} 
				}
				?>
			</div> <!-- /.list-posts -->

		</div> <!-- /.container -->
	</div> <!-- /.padding -->
</section> <!-- /.main-content -->

<?php
include 'footer.php';
?>