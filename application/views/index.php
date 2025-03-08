<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Main Page</title>
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
				<div class="col mt-4">
					<h1>Welcome to My Website</h1>
					<p>This is a sample view in CodeIgniter 3.</p>
					<?php if (isset($message)): ?>
					<p><?php echo $message; ?></p>
					<?php endif; ?>
					<a class="btn btn-success" href="<?php echo site_url('sellers'); ?>"
						>Go to Home</a
					>
				</div>
			</div>
		</div>
	</body>
</html>
