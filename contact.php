<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact | Trade Buddy</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
	<style>
	header {
		background-image: url('images/img_bg_2.jpg');
		background-size: cover;
		background-position: center;
		min-height: 400px;
		color: white;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	header h1 {
		background-color: rgba(0, 0, 0, 0.5);
		padding: 20px;
		border-radius: 10px;
	}
	</style>
</head>
<body>

<?php // navbar already included above ?>

<header>
	<h1>Contact Us</h1>
</header>


<div class="container py-5">
	<div class="row mb-5 g-4">
		<div class="col-lg-6">
			<div class="card shadow-sm">
				<div class="card-body">
					<h3 class="card-title mb-4">Get In Touch</h3>
					<form action="#" method="post" onsubmit="event.preventDefault(); alert('Your message will be sent to our team. We will get back to you soon!'); this.reset();">
						<div class="mb-3">
							<label class="form-label">Your Name</label>
							<input type="text" class="form-control" placeholder="Your Name" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Your Email</label>
							<input type="email" class="form-control" placeholder="Your Email" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Subject</label>
							<input type="text" class="form-control" placeholder="Subject" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Message</label>
							<textarea class="form-control" rows="5" placeholder="Message" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary w-100">Send Message</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card shadow-sm">
				<div class="card-body">
					<h3 class="card-title mb-4">Contact Information</h3>
					<ul class="list-unstyled mb-0">
						<li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i><strong>Address:</strong> Dubai Knowledge Village, UAE</li>
						<li class="mb-2"><i class="bi bi-person-fill me-2"></i><strong>Founder:</strong> Arhan Harchandani</li>
						<li class="mb-2"><i class="bi bi-envelope-fill me-2"></i><strong>Email:</strong> <a href="mailto:contact@mytradebuddy.com">contact@mytradebuddy.com</a></li>
						<li><i class="bi bi-globe me-2"></i><strong>Website:</strong> <a href="http://mytradebuddy.com">mytradebuddy.com</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card shadow-sm">
				<div class="card-body text-center">
					<h4 class="mb-3">Subscribe to Our Newsletter</h4>
					<form class="row g-2 justify-content-center">
						<div class="col-8">
							<input type="email" class="form-control" placeholder="Email address">
						</div>
						<div class="col-4">
							<button type="submit" class="btn btn-outline-primary w-100">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<footer class="bg-light text-center py-4">
	<p class="mb-0">&copy; 2025 Trade Buddy. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php include 'footer.php'; ?>

<!-- ...existing code from contact.html, with all .html links changed to .php... -->
<!-- The rest of the HTML content will be migrated and updated in the next step. -->
