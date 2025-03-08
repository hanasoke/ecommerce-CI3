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
		<div class="container">
			<div class="row">
				<div class="col mt-3">
					<h1>Edit Seller</h1>
					
					<?php 
						// Display flash messages
						if($this->session->flashdata('success')) : ?>
						<div class="alert alert-success">
							<?= $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<?php 
						// Display flash messages
						if($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>

					<form method="POST" action="<?php echo site_url('sellers/edit/' . $seller->id_seller); ?>">
						<div class="mb-3">
							<label for="seller_name">Name</label>
							<input
								type="text"
								class="form-control"
								name="seller_name"
								id="seller_name"
                                value="<?php echo $seller->seller_name; ?>"
								required
							/>
						</div>

						<div class="mb-3">
							<label for="seller_email">Email</label>
							<input
								type="text"
								class="form-control"
								name="seller_email"
								id="seller_email"
                                value="<?php echo $seller->seller_email; ?>"
								required
							/>
						</div>
						<div class="mb-3">
							<label for="seller_phone">Phone</label>
							<input
								type="number"
								class="form-control"
								name="seller_phone"
								id="seller_phone"
                                value="<?php echo $seller->seller_phone; ?>"
								required
							/>
                            
						</div>
						<div class="mb-3">
							<label for="seller_address">Address</label>
							<input
								type="text"
								class="form-control"
								name="seller_address"
								id="seller_address"
                                value="<?php echo $seller->seller_address; ?>"
								required
							/>
						</div>
						<div class="mb-3">
							<label for="seller_picture">Picture URL</label>
							<input
								type="file"
								class="form-control"
								id="seller_picture"
								name="seller_picture"
                                value="<?php echo $seller->seller_picture; ?>"
								required
							/>
						</div>
						<button type="submit" class="btn btn-primary float-end">
							Update
						</button>
                        <a href="<?php echo site_url('sellers') ?>" class="btn btn-secondary float-start">
	                        Back
                        </a>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
