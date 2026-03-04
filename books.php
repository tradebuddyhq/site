<?php include 'navbar.php'; ?>
<?php include 'db_connect.php'; ?>

<?php
$sql = "SELECT p.*, c.parent_name, c.email 
        FROM products p 
        JOIN customers c ON p.customer_id = c.id 
        WHERE p.category = 'Books'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Books | Trade Buddy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap + Icons -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Custom Styles -->
	<style>
		.product-grid {
			background-size: cover;
			background-position: center;
			height: 250px;
			border-radius: 8px;
		}
		.desc {
			margin-top: 10px;
		}
	</style>
</head>
<body>

<header class="text-white text-center" 
	style="background-image: url('images/books.jpg'); 
	       background-size: cover; 
	       background-position: center; 
	       min-height: 400px;">
	<div class="bg-dark bg-opacity-50 h-100 d-flex align-items-center justify-content-center">
		<h1 class="w-100">Books</h1>
	</div>
</header>

<div class="container py-5">
	<div class="row mb-4">
		<div class="col text-center">
			<h2>Products listed under the category "Books"</h2>
		</div>
	</div>

	<div class="row">
		<?php while ($row = $result->fetch_assoc()) { ?>
			<div class="col-12 col-sm-6 col-md-4 mb-4 text-center">
				<div class="product">
					<div class="product-grid" style="background-image:url('uploads/<?php echo htmlspecialchars($row['image']); ?>');"></div>
					<div class="desc">
						<h5><a href="product_details.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['product_name']); ?></a></h5>
						<p><?php echo htmlspecialchars($row['product_description']); ?></p>
					<p class="fw-bold"><?php echo htmlspecialchars($row['price']); ?> AED</p>
					<p class="text-muted">Seller: <?php echo htmlspecialchars($row['parent_name']); ?></p>
					<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sellerModal<?php echo $row['id']; ?>">
							Chat with Seller
						</button>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="sellerModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="sellerModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content border-0 shadow-lg">
						<div class="modal-header bg-primary text-white">
							<h5 class="modal-title" id="sellerModalLabel<?php echo $row['id']; ?>">Seller Details</h5>
							<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center">
						<h5><?php echo htmlspecialchars($row['parent_name']); ?></h5>
						<p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
						<a href="mailto:<?php echo htmlspecialchars($row['email']); ?>" class="btn btn-success mt-2">
							<i class="bi bi-envelope-fill"></i> Contact via Email
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-3" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-md-4 mb-4">
				<h5 class="fw-bold">Trade Buddy</h5>
				<p class="text-light">Making trading simple, sustainable, and community-driven.</p>
			</div>
			<div class="col-md-2 mb-4">
				<h6 class="text-uppercase">Quick Links</h6>
				<ul class="list-unstyled">
					<li><a href="#" class="text-white text-decoration-none">About</a></li>
					<li><a href="#" class="text-white text-decoration-none">Help</a></li>
					<li><a href="#" class="text-white text-decoration-none">Contact</a></li>
					<li><a href="#" class="text-white text-decoration-none">Terms</a></li>
				</ul>
			</div>
			<div class="col-md-4 offset-md-2 mb-4">
				<h6 class="text-uppercase">Connect With Us</h6>
				<a href="#" class="text-white me-3 fs-5"><i class="bi bi-facebook"></i></a>
				<a href="#" class="text-white me-3 fs-5"><i class="bi bi-twitter"></i></a>
				<a href="#" class="text-white me-3 fs-5"><i class="bi bi-instagram"></i></a>
				<a href="#" class="text-white fs-5"><i class="bi bi-envelope-fill"></i></a>
			</div>
		</div>
		<div class="row text-center mt-4">
			<div class="col">
				<p class="mb-0 small">&copy; 2025 Trade Buddy. All Rights Reserved.</p>
			</div>
		</div>
	</div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php $conn->close(); ?>
