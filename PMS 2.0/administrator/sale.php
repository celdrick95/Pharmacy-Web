<?php
include 'header.php';

?>

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-2 text-gray-800">Sales Report</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" onclick="alert('Function not ready.')">
				<i class="fas fa-download fa-sm text-white-50"></i> Generate Report
			</a>
		</div>

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Filter Dates</h6>
			</div>
			<div class="card-body">
				<form name="dateFilter">
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="label" for="date_to">From date:</label>
							<input id="date_from" class="form-control" type="date">
							<label id="date_from_" class="red-label"></label>
						</div>
						<div class="col-sm-4">
							<label class="label" for="date_to">To date:</label>
							<input id="date_to" class="form-control" type="date">
							<label id="date_to_" class="red-label"></label>
						</div>
						<div class="col-sm-4 mt-4">
							<input id="dateFilter_button" type="button" class="btn btn-dark btn-block" value="Show" />
						</div>
					</div>
				</form>
				<hr></hr>
				<div class="table-responsive">
					<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead align="center">
							<th>Date Sold</th>
							<th>Product</th>
							<th>Category</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Method of Payment</th>
						</thead>
						<tbody align="center">
						<?php
						if (isset($_SESSION['sql'])) {
							$mysqli = $db->query($_SESSION['sql']);
						}
						else {
							$mysqli = $db->query("select * from sales");
						}
						if ($mysqli->num_rows > 0) {
							$total = 0;
							while ($row = $mysqli->fetch_assoc()) {
								$total += $row['total'];
						?>
							<tr>
							<td><?=$funk->dateTime_to_word($row['dateSold'] . " " . $row['timeSold'])?></td>
							<td><?=$row['productName']?></td>
							<td><?=$row['productCategory']?></td>
							<td><?=$funk->toPeso($row['price'])?></td>
							<td><?=$row['quantity']?></td>
							<td>₱<?=$funk->toPeso($row['total'])?></td>
							<td><?=$row['methodOfPayment']?></td>
							</tr>
						<?php
							}
						}
						?>
						</tbody>
						<tfoot align="center">
							<th colspan="8">Grand Total: PHP <?php
							if (isset($total)) {
								echo $total;
							}
							else {
								echo "0";
							}
							?>.00</th>
						</tfoot>
					</table>
				</div> <!-- table-responsive -->
			</div> <!-- card-body -->
		</div> <!-- card -->

	</div> <!-- /.container-fluid -->
	
<script src="js/sale.js"></script>

<?php
include 'footer.php';
?>