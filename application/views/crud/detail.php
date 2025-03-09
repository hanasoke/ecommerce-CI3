<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Edit Seller</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<div class="container mb-4">
			<div class="row">
				<div class="col mt-3">
					<div class="card">
						<div class="card-body">
							<h1 class="card-title">Seller Profile Detail</h1>
								<div class="mb-3 row">
									<label for="seller_name" class="col-sm-2 col-form-label">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control-plaintext" name="seller_name" id="seller_name" value="<?php echo $seller->seller_name; ?>" />
									</div>
								</div>
								
								<div class="mb-3 row">
									<label for="seller_email" class="col-sm-2 col-form-label" >Email</label>
									<div class="col-sm-10">
										<input type="text" class="form-control-plaintext" name="seller_email" id="seller_email" value="<?php echo $seller->seller_email; ?>"/>
									</div>
								</div>

								<div class="mb-3 row">
									<label for="seller_phone" class="col-sm-2">Phone</label>
									<div class="col-sm-10">
										<input type="number" class="form-control-plaintext" disabled name="seller_phone" id="seller_phone" value="<?php echo $seller->seller_phone; ?>" />
									</div>
								</div>

								<div class="mb-3 row">
									<label for="seller_address" class="col-sm-2">Address</label>
									<div class="col-sm-10">
										<input type="text" class="form-control-plaintext" name="seller_address" id="seller_address" value="<?php echo $seller->seller_address; ?>" />
									</div>
								</div>

								<div class="mb-3 row">
									<label for="seller_picture" class="col-sm-2">Picture</label>

									<!-- Display the current image -->
									<div class="col-sm-10">
										<?php if(!empty($seller->seller_picture)) : ?>
											<img src="<?php echo base_url('public/img/sellers/' . $seller->seller_picture); ?>" alt="Current Image" class="img-thumbnail mb-2" width="150" />
										<?php endif; ?>
									</div>
									
									
								</div>
								
								<a href="<?php echo site_url('sellers') ?>" class="btn btn-secondary float-start">
									Back
								</a>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"
	></script>
</html>
