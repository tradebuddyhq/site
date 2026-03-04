<?php
// admin_product_edit.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}
require 'db_connect.php';

if (!isset($_GET['id'])) {
    header('Location: admin_products.php');
    exit();
}
$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $sql = "UPDATE products SET product_name=?, price=?, category=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdsi', $name, $price, $category, $id);
    $stmt->execute();
    header('Location: admin_products.php');
    exit();
}

$sql = "SELECT * FROM products WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();
if (!$product) {
    echo "Product not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?php echo htmlspecialchars($product['category']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="admin_products.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
