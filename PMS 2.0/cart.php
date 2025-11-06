<?php
	include 'header.php';
?>

<section class="main-content">
	<div class="padding">
		<div class="container">

			<div class="contact">

				<div class="contact-details">
					<div id="div-file">
					</div>
				
					<div class="details-top text-center">
						<h2 class="section-title">Cart</h2><!-- /.section-title -->
					</div><!-- /.details-top -->

					<div id="#center" class="table-responsive">
						<table class="table table-hover" width="100%" cellspacing="0">
							<thead align="center">
								<th>
									<center>Image</center>
								</th>
								<th>
									<center>Product Name</center>
								</th>
								<th>
									<center>Category</center>
								</th>
								<th>
									<center>Price</center>
								</th>
								<th>
									<center>Quantity</center>
								</th>
								<th>
									<center>Total</center>
								</th>
								<th>
									<center>Action</center>
								</th>
							</thead>
							<tbody align="center">
							<?php
							if (isset($_SESSION['x']) && isset($_SESSION['grand_total'])) {
								$x = 0;
								while($x <= $_SESSION['x']) {
									$mysqli = $db->query("select * from product_categories where categoryName like \"" . $_SESSION['category'][$x] . "\"");
									if ($mysqli->num_rows > 0) {
										while ($row = $mysqli->fetch_assoc()) {
											$mysqli1 = $db->query("select * from product_inventory where productName like \"" . $_SESSION['product'][$x] . "\"");
											if ($mysqli1->num_rows > 0) {
												while ($row1 = $mysqli1->fetch_assoc()) {
													break;
												}
											}
											break;
										}
									}
							?>
								<tr>
									<td><img height="70px" width="70px" src="<?=$row1['imageSource']?>"></td>
									<td><?=$_SESSION['product'][$x]?></td>
									<td><?=$_SESSION['category'][$x]?></td>
									<td><?=$funk->toPeso($_SESSION['price'][$x])?></td>
									<td><?=$_SESSION['quantity'][$x]?></td>
									<td><?=$funk->toPeso($_SESSION['quantity'][$x]*$_SESSION['price'][$x])?></td>
									<td>
										<div class="dropdown">
											<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action <span class="caret"></span>
											</button>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<li>
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#myModal" onclick="displayOnModal(<?=$x?>)" style="cursor:pointer">Update</a>
												</li>
												<li>
													<a class="dropdown-item" href="assets/php/add_removeCart.php?removeFromCart=<?=$x?>" onclick="return confirm('Remove from Cart?')">Remove</a>
												</li>
											</ul>
										</div>
									</td>
								</tr>
								<?php
									$x++;
								}
							}
							else {
							?>
								<td colspan="7">No Items in Cart.
							<?php
							}
							?>
							</tbody>
							<?php
							if (isset($_SESSION['grand_total'])) {
							?>
							<tfoot>
								<th colspan="4">
									<center>Grand Total: <?=$funk->toPeso($_SESSION['grand_total'])?></center>
								</th>
								<th colspan="3">
									<a class="btn" href="checkout.php" onclick="return confirm('Proceed to checkout?')">Proceed to Checkout?</a>
								</th>
							</tfoot>
							<?php
							}
							?>
						</table>
					</div> <!-- table -responsive -->

				</div> <!-- /.contact-details -->

			</div> <!-- /.contact -->

		</div> <!-- /.container -->
	</div> <!-- /.padding -->
</section> <!-- /.main-content -->

<div id="myModal" class="modal" tabindex="-1" role="dialog"> <!-- The Modal -->
  <div class="modal-content"> <!-- Modal content -->
		<div class="modal-header text-center">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 id="modal_title" class="modal-title"></h4>
		</div> <!-- .modal-header -->
		<div class="modal-body text-center">
			<div class="entry-thumbnail" style="text-align:center">
				<img id="modal_image" class="img-rounded" width="200" height="200" allowfullscreen="" />
			</div> <!-- /.entry-thumbnail -->
			<br>
			
			<span class="time">
				<time id="modal_expiryDate" datetime=""></time>
			</span> <!-- /.time -->
			<br>
			<span class="time">
				<time id="modal_stock" datetime=""></time>
			</span> <!-- /.time -->
			<br>
			<span class="time">
				<time id="modal_price" datetime=""></time>
			</span> <!-- /.time -->
			
			<form name="addToCart" class="wpcf7-form justify-content-center">
				<span class="wpcf7-form-control-wrap submit">
					<input type="number" id="quantity" class="wpcf7-form-control" value="" placeholder="Quantity" required="" style="width:45%" />
				</span>
				<span class="wpcf7-form-control-wrap submit">
					<input type="button" id="cartButton" class="btn wpcf7-form-control" value="Update Cart" style="width:45%" />
				</span>
			</form>
		</div> <!-- .modal-body -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
  </div> <!-- .modal-content -->
</div> <!-- #myModal -->

<script src="assets/js/cart.js"></script>

<?php
	include 'footer.php';
?>