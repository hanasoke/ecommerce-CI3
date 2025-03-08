<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Add Seller</title>
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
					<h1>Add Seller</h1>

					<!-- Display file upload errors -->
					<?php if ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error'); ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php endif; ?>

					<?php 
						// Display flash messages
                		if ($this->session->flashdata('success')) {
                    		$this->session->flashdata('success');
                		}

                		if ($this->session->flashdata('error')) {
                    		$this->session->flashdata('error');
                		}

						// Display validation errors
						echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
					?>


					<form method="POST" action="<?php echo site_url('sellers/add'); ?>" enctype="multipart/form-data" >
						<div class="mb-3">
							<label for="seller_name">Name</label>
							<input
								type="text"
								class="form-control"
								name="seller_name"
								id="seller_name"
								value="<?php echo set_value('seller_name') ?>"
							/>
						</div>
						<div class="mb-3">
							<label for="seller_email">Email</label>
							<input
								type="email"
								class="form-control"
								name="seller_email"
								id="seller_email"
								value="<?php echo set_value('seller_email') ?>"
							/>
						</div>
						<div class="mb-3">
							<label for="seller_phone">Phone</label>
							<input
								type="number"
								class="form-control"
								name="seller_phone"
								id="seller_phone"
								value="<?php echo set_value('seller_phone') ?>"
							/>
						</div>
						<div class="mb-3">
							<label for="seller_address">Address</label>
							<input
								type="text"
								class="form-control"
								name="seller_address"
								id="seller_address"
								value="<?php echo set_value('seller_address') ?>"
							/>
						</div>
						<div class="mb-3">
							<label for="seller_picture">My Picture</label>
							<input
								type="file"
								class="form-control"
								id="seller_picture"
								name="seller_picture"
							/>
						</div>
						<button type="submit" class="btn btn-primary float-end">
							Submit
						</button>
						<a
							href="<?php echo site_url('sellers') ?>"
							class="btn btn-secondary float-start"
						>
							Back
						</a>
					</form>
				</div>
			</div>
		</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
			crossorigin="anonymous"
		></script>
	</body>
</html>
