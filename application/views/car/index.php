<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>CAR DATA</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg bg-secondary">
			<div class="container">
				<a class="navbar-brand" href="#">CAR DATA</a>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active text-primary fw-semibold" aria-current="page" href="<?php print site_url('sellers') ?>">Sellers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="<?php print site_url('cars') ?>">Cars</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container mt-5">
			<div class="row">
				<div class="col">
					<a
						class="btn btn-primary mb-3 float-end"
						href="<?php echo site_url('car/add'); ?> "
						>Add Data</a
					>
					<a class="btn btn-secondary mb-3" href="<?php echo site_url('sellers'); ?> "
						>Back to Seller Data</a
					>
				</div>
			</div>
			<div class="row">
				<!-- Display flash message -->
				<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('success'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error'); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="col">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Name</th>
								<th>Color</th>
								<th>Brand</th>
								<th>Transmission</th>
								<th>Seat</th>
								<th>Machine</th>
								<th>Power</th>
								<th>Price</th>
								<th>Stock</th>
								<th>Manufacture</th>
								<th>Photo</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; foreach($cars as $car) : ?>
							<tr class="text-center">
								<td>
									<?= $i++; ?>
								</td>
								<td>
									<?= $car->name; ?> 
								</td>
								<td>
									<?= $car->color; ?>
								</td>
								<td>
									<?= $car->brand; ?>
								</td>
								<td>
									<?= $car->transmission; ?>
								</td>
								<td>
									<?= $car->seat; ?>
								</td>
								<td>
									<?= $car->machine; ?>
								</td>
								<td>
									<?= $car->power; ?>
								</td>
								<td>
									<?= $car->price; ?>
								</td>
								<td>
									<?= $car->stock; ?>
								</td>
								<td>
									<?= $car->manufacture; ?>
								</td>
								<td>
									<img src="<?php print base_url('public/img/cars/' . $car->photo); ?>" alt="Car Picture" width="100" >
								</td>
								<td>
									<a href="<?php echo site_url('car/edit/' . $car->id); ?>" class="btn btn-primary">Edit</a>

									<form action="<?php echo site_url('car/delete/' . $car->id); ?>" method="POST" style="display: inline;">
										<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?)'">Delete</button>
									</form>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</body>
</html>
