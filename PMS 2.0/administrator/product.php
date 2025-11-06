<?php
	include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-2 text-gray-800">Add New Product</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" onclick="alert('Function not ready.')">
			<i class="fas fa-download fa-sm text-white-50"></i> Generate Report
		</a>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Product List</h6>
		</div>
		<div class="card-body">
			<div class="row justify-content-center">
				<div class="col-sm-8 d-lg-block">
					<input type="button" class="btn btn-success btn-block" value="Add New Product" data-toggle="modal" data-target="#addProduct_modal">
				</div> <!-- col -->
			</div> <!-- row -->
			
			<hr></hr>

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead align="center">
						<th>Image</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Expiry Date</th>
						<th>Date Added</th>
						<th>Action</th>
					</thead>
					<tfoot align="center">
						<th>Image</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Expiry Date</th>
						<th>Date Added</th>
						<th>Action</th>
					</tfoot>
					<tbody align="center">
					<?php
					$mysqli = $db->query("select * from product_inventory");
					if ($mysqli->num_rows > 0) {
						while ($row = $mysqli->fetch_assoc()) {
							$productCategory = preg_replace("!'!", "\'", $row['productCategory']);
							?>
						<tr>
							<td><img width="100%" src="../<?=$row['imageSource']?>"></td>
							<td><?=$row['productName']?></td>
							<td><?=$row['productCategory']?></td>
							<td><?=$funk->toPeso($row['price'])?></td>
							<td><?=$row['stock']?></td>
							<td><?=$funk->dateToWord($row['expiryDate'])?></td>
							<td><?=$funk->dateToWord($row['dateAdded'])?></td>
							<td>
								<div class="dropdown">
									<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<li>
											<a href="#" class="dropdown-item" data-toggle="modal" data-target="#updateProduct_modal" onclick="showProduct('<?=$row['productId']?>', '<?=$row['productName']?>', '<?=$productCategory?>', <?=$row['price']?>, <?=$row['stock']?>, '<?=$row['expiryDate']?>', '<?=$row['imageSource']?>')">Update</a>
										</li>
										<li>
											<a href="php/process.php?removeProduct_button=<?=$row['productId']?>" class="dropdown-item" onclick="return confirm('Remove Product?')">Remove</a>
										</li>
									</ul>
								</div>
							</td>
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
	
<!-- Add New Product Modal -->
<div class="modal fade" id="addProduct_modal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addProductLabel">Add New Product</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="addProduct" action="php/process.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="add_productName" class="label">Product Name</label>
						<input name="add_productName" type="text" class="form-control mb-3" placeholder="Product Name" onfocusout="v2.empty_or_default(this)">
						<label id="add_productName_" class="red-label"></label>
					</div>
					<div class="from-group mb-3">
						<label for="add_productCategory" class="label">Category</label>
						<select name="add_productCategory" class="form-control" onfocusout="v2.empty_or_default(this)">
							<option value="Default" selected>Category</option>
							<?php
							$mysqli = $db->query("select * from product_categories");
							if ($mysqli->num_rows > 0) {
								while ($row = $mysqli->fetch_assoc()) {
									?>
							<option value="<?=$row['categoryName']?>"><?=$row['categoryName']?></option>
									<?php
								}
							}
							?>
						</select>
						<label id="add_productCategory_" class="red-label"></label>
					</div>
					<div class="form-group">
						<label for="add_price" class="label">Price</label>
						<input name="add_price" type="number" class="form-control" value="" placeholder="Price" onfocusout="v2.number(this)">
						<label id="add_price_" class="red-label"></label>
					</div>
					<div class="form-group">
						<label for="add_stock" class="label">Stock</label>
						<input name="add_stock" type="number" class="form-control" value="" placeholder="Stock" onfocusout="v2.number(this)">
						<label id="add_stock_" class="red-label"></label>
					</div>
					<div class="form-group">
						<label for="add_expiryDate" class="label">Expiry Date</label>
						<input name="add_expiryDate" type="date" class="form-control" onfocusout="v2.expiryDate(this)">
						<label id="add_expiryDate_"class="red-label"></label>
					</div>
					<div class="form-group">
						<label for="add_imageUpload"class="label">Image</label>
						<input name="add_imageUpload" id="add_imageUpload"type="file" class="form-control" placeholder="Profile Image" onfocusout="v2.empty_or_default(this)">
						<label id="add_imageUpload_"class="red-label"></label>
					</div>
					<input id="addProduct_button" type="button" class="btn btn-info btn-block" value="Add New Product">
					<input name="addProduct_submit" type="submit" type="hidden" value="submit" style="display:none">
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			</div> <!-- modal-footer -->
		</div> <!-- /.modal-content -->
	</div> <!-- modal-dialog -->
</div> <!-- /.modal -->

<!-- Update Product Modal -->
<div class="modal fade" id="updateProduct_modal" tabindex="-1" role="dialog" aria-labelledby="updateProductLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateProductLabel">Update Product</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="updateProduct" action="php/process.php" method="post" enctype="multipart/form-data">
					<div class="form-group text-center">
						<img width="150px" id="update_image"></img>
					</div>
					<div class="form-group">
						<label for="update_productName" class="label">Product Name</label>
						<input name="update_productName" type="text" class="form-control mb-3" placeholder="Product Name" onfocusout="v2.empty_or_default(this)">
						<label  id="update_productName_" class="red-label"></label>
					</div>
					<div class="from-group mb-3">
						<label  for="update_productCategory" class="label">Category</label>
						<select name="update_productCategory" class="form-control" onfocusout="v2.empty_or_default(this)">
							<?php
							$mysqli = $db->query("select * from product_categories");
							if ($mysqli->num_rows > 0) {
								$x = 0;
								while ($row = $mysqli->fetch_assoc()) {
									if (isset($_SESSION['productId'])) {
										if ($x == 0) {
											?>
							<option value="Default" selected>Category</option>
											<?php
										}
										if ($_SESSION['productId'] == $row['productId']) {
											unset($_SESSION['productId']);
											?>
							<option value="<?=$row['categoryName']?>" selected><?=$row['categoryName']?></option>
											<?php
										}
										else {
											?>
							<option value="<?=$row['categoryName']?>"><?=$row['categoryName']?></option>
											<?php
										}
									}
									else {
										if ($x == 0) {
										?>
							<option value="Default" selected>Category</option>
										<?php
										}
										else {
											?>
							<option value="<?=$row['categoryName']?>"><?=$row['categoryName']?></option>
											<?php
										}
									}
									$x++;
								}
							}
							?>
						</select>
						<label class="red-label" id="update_productCategory_"></label>
					</div>
					<div class="form-group">
						<label for="update_price"class="label" >Price</label>
						<input name="update_price" type="number" class="form-control" value="" placeholder="Price" onfocusout="v2.number(this)" />
						<label id="update_price_"class="red-label" ></label>
					</div>
					<div class="form-group">
						<label for="update_stock"class="label">Stock</label>
						<input name="update_stock" type="number" class="form-control" value="" placeholder="Stock" onfocusout="v2.number(this)" />
						<label id="update_stock_" class="red-label"></label>
					</div>
					<div class="form-group">
						<label for="update_expiryDate" class="label">Expiry Date</label>
						<input name="update_expiryDate" type="date" class="form-control" onfocusout="v2.expiryDate(this)">
						<label id="update_expiryDate_"class="red-label"></label>
					</div>
					<div class="form-group">
						<label for="update_imageUpload"class="label">Image</label>
						<input name="update_imageUpload" type="file" class="form-control" placeholder="Profile Image">
						<label name="update_imageUpload_" class="red-label"></label>
					</div>
					<input id="updateProduct_button" type="button" class="btn btn-info btn-block" value="Update Product">
					<input name="updateProduct_submit" type="submit" type="hidden" value="submit" style="display:none">
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			</div> <!-- modal-footer -->
		</div> <!-- /.modal-content -->
	</div> <!-- modal-dialog -->
</div> <!-- /.modal -->

<script src="js/product.js"></script>

<?php
	include 'footer.php';
?>