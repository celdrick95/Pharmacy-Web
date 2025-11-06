<?php
	include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-2 text-gray-800">Add New Category</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" onclick="alert('Function not ready.')">
			<i class="fas fa-download fa-sm text-white-50"></i> Generate Report
		</a>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Category List</h6>
		</div>
		<div class="card-body">
			<div class="row justify-content-center">
				<div class="col-sm-8 d-lg-block">
					<input type="button" class="btn btn-success btn-block" value="Add New Category" data-toggle="modal" data-target="#addCategory_modal">
				</div> <!-- col -->
			</div> <!-- row -->

			<hr></hr>
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<th>Category</th>
						<th>Action</th>
					</thead>
					<tfoot>
						<th>Category</th>
						<th>Action</th>
					</tfoot>
					<tbody>
					<?php
					$mysqli = $db->query("select * from product_categories");
					if ($mysqli->num_rows > 0) {
						while ($row = $mysqli->fetch_assoc()) {
							$categoryName = preg_replace("!'!", "\'", $row['categoryName']);
							?>
							<tr>
								<td><?=$row['categoryName']?></td>
								<td>
									<div class="dropdown">
										<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Action <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<li>
												<a href="#" onclick="showCategory( <?=$row['categoryId']?>, '<?=$categoryName?>')" class="dropdown-item"  data-toggle="modal" data-target="#updateCategory_modal">Update</a>
											</li>
											<li>
												<a href="php/process.php?categoryId=<?=$row['categoryId']?>&productCategory=<?=$categoryName?>&categoryButton=Remove+Category" class="dropdown-item"  onclick="return confirm('This will also remove the product(s) with this category name.\rProceed?')">Remove</a>
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

<!-- Add New Category Modal -->
<div class="modal fade" id="addCategory_modal" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addCategoryLabel">Add New Category</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="addCategory">
					<div class="form-group">
						<label class="label" for="add_categoryName">Category Name</label>
						<input id="add_categoryName" type="text" class="form-control mb-3" placeholder="Category Name" onfocusout="v2.empty(this)">
						<label class="red-label" id="add_categoryName_"></label>
					</div>
					<input id="addCategory_button" type="button" class="btn btn-info btn-block" value="Add New Category">
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			</div> <!-- modal-footer -->
		</div> <!-- /.modal-content -->
	</div> <!-- modal-dialog -->
</div> <!-- /.modal -->

<!-- Update Category Modal -->
<div class="modal fade" id="updateCategory_modal" tabindex="-1" role="dialog" aria-labelledby="updateCategoryLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateCategoryLabel">Update Category</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="updateCategory">
					<div class="form-group">
						<label class="label" for="update_categoryName">Category Name</label>
						<input id="update_categoryName" type="text" class="form-control mb-3" placeholder="Category Name" onfocusout="v2.empty(this)">
						<label class="red-label" id="update_categoryName_"></label>
					</div>
					<input id="updateCategory_button" type="button" class="btn btn-info btn-block" value="Update Category">
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			</div> <!-- modal-footer -->
		</div> <!-- /.modal-content -->
	</div> <!-- modal-dialog -->
</div> <!-- /.modal -->

<script src="js/category.js"></script>

<?php
	include 'footer.php';
?>