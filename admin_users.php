
<?php
// admin_users.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}
require 'db_connect.php';
$result = $conn->query('SELECT id, parent_name, email FROM customers');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users</title>
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
        h2 { font-size: 2.2rem !important; }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="admin-table-header mb-4">
        <h2 class="mb-2">Registered Users</h2>
        <a href="admin_panel.php" class="btn btn-secondary">Back to Panel</a>
    </div>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['parent_name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
