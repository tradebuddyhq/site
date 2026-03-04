
<?php
// admin_products.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}
require 'db_connect.php';
$result = $conn->query('SELECT id, product_name, price, category, customer_id, is_active FROM products');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Fira+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { background: #f8f9fa; font-size: 1.15rem !important; }
        .admin-table-header {
            background: linear-gradient(90deg, #00b894, #00cec9);
            color: #fff;
            padding: 1.5rem 0 1rem 0;
            border-radius: 0 0 1rem 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }
        .table {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
        }
        .table th {
            background: #00b894;
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem !important;
        }
        .btn-sm { min-width: 70px; font-size: 1.05rem !important; }
        h2 { font-size: 2.2rem !important; }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="admin-table-header mb-4">
        <h2 class="mb-2">All Products</h2>
        <a href="admin_panel.php" class="btn btn-secondary">Back to Panel</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Owner (Customer ID)</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td><?php echo htmlspecialchars($row['category']); ?></td>
                <td><?php echo htmlspecialchars($row['customer_id']); ?></td>
                <td>
                    <?php if (isset($row['is_active']) && $row['is_active']): ?>
                        <span class="badge bg-success">Active</span>
                    <?php else: ?>
                        <span class="badge bg-secondary">Inactive</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="admin_product_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="admin_product_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    <?php if (isset($row['is_active']) && $row['is_active']): ?>
                        <a href="admin_product_revoke.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Revoke</a>
                    <?php else: ?>
                        <a href="admin_product_grant.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Grant</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
