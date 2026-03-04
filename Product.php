
<?php
session_start();
// Allow access if a customer is logged in OR an admin is logged in
if (!isset($_SESSION['customer_id']) && empty($_SESSION['admin_logged_in'])) {
	header('Location: login.html');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tradebuddy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />
	<link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Fira+Sans:600" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>
	<div class="fh5co-loader"></div>
	<div id="page">






		<div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div class="row mb-4">
				   <div class="col text-center">
					<a href="upload.php" class="btn btn-lg" style="background: linear-gradient(90deg, #00b894, #00cec9); color: #fff; border: none;"><i class="bi bi-plus-circle"></i> Upload Product</a>
				   </div>
			   </div>
				<div class="row">
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-bag"></i>
							</span>
							<h3>What is Trade Buddy?</h3>
							<p>Welcome to Trade Buddy. We are a trusted marketplace for parents to exchange school essentials - safely, sustainably, and within your school community.
							</p>
							<!-- <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<h3>Do I have to pay?</h3>
							<p>Trade Buddy is completely free to use.
Individuals can list items to give away, trade directly with others, or post requests for what they need.
</p>
							<!-- <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p> -->
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-paper-plane"></i>
							</span>
							<h3>Is your code open source?</h3>
							<p>Yes. Our website code remains open source on GitHub.
We believe in transparency and collaboration, anyone is welcome to view, learn from, or contribute to the project’s development.</p>
							<p><a href="https://github.com/tradebuddyhq" class="btn btn-primary btn-outline">Learn
																More</a></p>
						</div>
					</div>
				</div>

				
			</div>
		</div>
		<div id="fh5co-product">
		   <div class="container">
			   
			   <div class="row animate-box">
				   <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					   <h2>Categories</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/electronics.png);">
								<div class="inner">
									<p>
										<a href="electronics.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="electronics.php">Electronics</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/books.jpg);">
								<div class="inner">
									<p>
										<a href="books.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="books.php">Books</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/videogames.png);">
								<div class="inner">
									<p>
										<a href="videogames.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="videogames.php">Video Games</a></h3>
							</div>
						</div>
					</div>


					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/toys.png);">
								<div class="inner">
									<p>
										<a href="toys.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="toys.php">Toys</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/householditems.png);">
								<div class="inner">
									<p>
										<a href="householditems.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="householditems.php">Household Items</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/kitchenitems.png);">
								<div class="inner">
									<p>
										<a href="kitchen-items.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="kitchen-items.php">Kitchen Items</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/furniture.png);">
								<div class="inner">
									<p>
										<a href="furniture.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="furniture.php">Furniture</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/sportsequipment.png);">
								<div class="inner">
									<p>
										<a href="sportsequipment.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="sportsequipment.php">Sports Equipment</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/clothingandaccessories.png);">
								<div class="inner">
									<p>
										<a href="clothingandaccessories.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="clothingandaccessories.php">Clothing and Accessories</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/jewelryandwatches.png);">
								<div class="inner">
									<p>
										<a href="jewelryandwatches.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="jewelryandwatches.php">Jewelry and Watches</a></h3>
							</div>
						</div>
					</div>

					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/boardgames.png);">
								<div class="inner">
									<p>
										<a href="boardgames.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="boardgames.php">Board Games</a></h3>
							</div>
						</div>
					</div>
					
						<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/polo_image.png);">
								<div class="inner">
									<p>
										<a href="schooluniform.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="schooluniform.php">School Uniform</a></h3>
							</div>
						</div>
					</div>
					
					
					
					
				</div>
			</div>
		</div>




	<?php include 'footer.php'; ?>

</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>

