

<?php include 'navbar.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['customer_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'login.html';</script>";
    exit();
}
$conn = null;
require 'db_connect.php';
$customer_id = $_SESSION['customer_id'];
$sql = "SELECT parent_name, email FROM customers WHERE id = $customer_id";
$userResult = $conn->query($sql);
$user = $userResult->fetch_assoc();
$productSql = "SELECT product_name, price, product_description, image FROM products WHERE customer_id = $customer_id";
$productResult = $conn->query($productSql);
$messageSql = "SELECT COUNT(*) as unread_count FROM messages WHERE receiver_id = $customer_id AND is_read = 0";
$messageResult = $conn->query($messageSql);
$messageRow = $messageResult->fetch_assoc();
$unread_count = $messageRow['unread_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trade Buddy - Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .profile-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0px 6px 12px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .avatar {
            font-size: 60px;
            background-color: #dee2e6;
            width: 90px;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: auto;
        }

        .product-card {
            height: 100%;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.12);
            transition: 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .btn-group .btn {
            margin: 5px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="profile-section text-center">
        <div class="avatar mb-3">
            <i class="bi bi-person-circle"></i>
        </div>
        <h3 class="mb-1"><?php echo htmlspecialchars($user['parent_name']); ?></h3>
        <p class="text-muted">📧 <?php echo htmlspecialchars($user['email']); ?></p>

        <div class="btn-group mt-3">
            <a href="upload.php" class="btn btn-outline-success"><i class="bi bi-upload"></i> Upload Product</a>
            <a href="logout.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <h4 class="mb-4">🧾 Your Listed Products</h4>
    <div class="row g-4">
        <?php while ($product = $productResult->fetch_assoc()) { ?>
            <div class="col-md-4 d-flex">
                <div class="card product-card w-100">
                    <img src="<?php echo !empty($product['image']) ? 'uploads/' . htmlspecialchars($product['image']) : 'uploads/default.jpg'; ?>" class="product-img card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                        <span class="badge bg-success mb-2"><?php echo htmlspecialchars($product['price']); ?> AED</span>
                        <p class="card-text">
                            <?php echo !empty($product['product_description']) ? htmlspecialchars($product['product_description']) : 'No description provided.'; ?>
                        </p>
                        <form action="delete_product.php" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100 mt-2"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>
</html>

<?php $conn->close(); ?>
