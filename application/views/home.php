<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Home Page</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container">
				<a class="navbar-brand" href="#">E-COMMERCE</a>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
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
						href="<?php echo site_url('sellers/add'); ?> "
						>Add Data</a
					>
					<a class="btn btn-secondary mb-3" href="<?php echo site_url('/'); ?> "
						>Back to Default</a
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
								<td>ID</td>
								<td>Name</td>
								<td>Email</td>
								<td>Phone</td>
								<td>Address</td>
								<th>Picture</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; foreach($sellers as $seller) : ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $seller->seller_name; ?></td>
								<td><?= $seller->seller_email; ?></td>
								<td><?= $seller->seller_phone; ?></td>
								<td><?= $seller->seller_address; ?></td>
								<td>
									<img src="<?php echo base_url('public/img/sellers/' . $seller->seller_picture); ?>" alt="Seller Picture" width="100">
								</td>
								<td>
									<a
										href="<?php echo site_url('sellers/edit/' . $seller->id_seller); ?>"
										class="btn btn-warning"
										>Edit</a
									>
								<form action="<?php echo site_url('sellers/delete/' . $seller->id_seller); ?>" method="POST" style="display: inline;" >
									<button	type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
