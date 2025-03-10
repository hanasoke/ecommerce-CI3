<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>
            Add Car
        </title>
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
					<div class="card">
						<div class="card-body">
							<h2 class="card-title">Add Car</h2>

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

							<form method="POST" action="<?php echo site_url('sellers/add'); ?>" enctype="multipart/form-data">
								<div class="mb-3 row">
									<label for="name" class="col-sm-2">Name</label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" value="#"/>
                                    </div>
								</div>

								<div class="mb-3 row">
									<label for="color" class="col-sm-2 col-form-label">Color</label>
									<div class="col-sm-10">
                                        <select class="form-control" name="color" id="color">
                                            <option selected value="#">Select the Color</option>
                                            <option value="White">White</option>
                                            <option value="Black">Black</option>
                                            <option value="Silver">Silver</option>
                                            <option value="Bronze">Bronze</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Red">Red</option>
                                        </select>
                                    </div>
								</div>

								<div class="mb-3 row">
									<label for="brand" class="col-sm-2 col-form-label">Brand</label>
									<div class="col-sm-10">
                                        <select class="form-control" name="brand" id="brand" value="#">
                                            <option selected value="#">Select the Brand</option>
                                            <option value="BWD">BWD</option>
                                            
                                            <option value="Honda">Honda</option>
                                            <option value="Daihatsu">Daihatsu</option>
                                            <option value="Mitsubishi">Mitsubishi</option>
                                            <option value="Tesla">Tesla</option>
                                            <option value="Chevrolet">Chevrolet</option>
                                            <option value="Ferrari">Ferrari</option>
                                            <option value="BMW">BMW</option>
                                            <option value="Nissan">Nissan</option>
                                            <option value="Toyota">Toyota</option>
                                        </select>

                                    </div>
								</div>

								<div class="mb-3">
									<label for="seller_address">Address</label>
									<input type="text" class="form-control" name="seller_address" id="seller_address" value="#" />
								</div>

								<div class="mb-3">
									<label for="seller_picture">My Picture</label>
									<input type="file" class="form-control" id="seller_picture" name="seller_picture" />
								</div>

								<button type="submit" class="btn btn-primary float-end">
									Submit
								</button>
								
								<a href="<?php echo site_url('sellers') ?>" class="btn btn-secondary float-start">
									Back
								</a>
							</form>
						</div>
					</div>				
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
