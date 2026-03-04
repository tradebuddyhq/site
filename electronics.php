<?php include 'navbar.php'; ?>
<?php include 'db_connect.php'; ?>

<?php
$sql = "SELECT p.*, c.parent_name, c.email, c.child_year_grade FROM products p 
	JOIN customers c ON p.customer_id = c.id 
	WHERE p.category = 'Electronics'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Electronics | Trade Buddy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap & Icons -->
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
	style="background-image: url('images/electronics.png'); 
	       background-size: cover; 
	       background-position: center; 
	       min-height: 400px;">
	<div class="bg-dark bg-opacity-50 h-100 d-flex align-items-center justify-content-center">
		<h1 class="w-100">Electronics</h1>
	</div>
</header>

<div class="container py-5">
	<div class="row mb-4">
		<div class="col text-center">
			<h2>Products listed under the category "Electronics"</h2>
		</div>
	</div>

	<div class="row">
		<?php while ($row = $result->fetch_assoc()) { ?>
			<div class="col-12 col-sm-6 col-md-4 mb-4 text-center">
				<div class="product">
					<div class="product-grid" style="background-image:url(uploads/<?php echo htmlspecialchars($row['image']); ?>);"></div>
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
						<p><strong>Year Group:</strong> <?php echo htmlspecialchars($row['child_year_grade']); ?></p>
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

<?php $conn->close(); ?>

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- Bootstrap JS (with Popper for dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
