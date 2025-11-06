<?php
include "class.php";
if (isset($_POST['x'])) {
	$mysqli = $db->query("select * from product_categories limit $_POST[x]");
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
}
?>