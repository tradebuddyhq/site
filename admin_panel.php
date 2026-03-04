
<?php
// admin_panel.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Fira+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { background: #f8f9fa; font-size: 1.15rem !important; }
        .admin-panel-header {
            background: linear-gradient(90deg, #00b894, #00cec9);
            color: #fff;
            padding: 2rem 0 1rem 0;
            border-radius: 0 0 1rem 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }
        .admin-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }
        .admin-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 4px 24px rgba(0,0,0,0.12);
        }
        .admin-card .card-title {
            font-size: 1.5rem !important;
            font-weight: 600;
        }
        .admin-card .btn {
            border-radius: 2rem;
            font-weight: 500;
            font-size: 1.1rem !important;
        }
        h2 { font-size: 2.2rem !important; }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="admin-panel-header mb-4">
        <h2 class="mb-2">Welcome, Admin!</h2>
        <a href="admin_logout.php" class="btn btn-danger">Logout</a>
    </div>
    <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-sm-6">
            <div class="card admin-card text-center p-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">View Users</h5>
                    <a href="admin_users.php" class="btn btn-primary px-4">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card admin-card text-center p-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">View Products</h5>
                    <a href="admin_products.php" class="btn btn-primary px-4">Go</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="card admin-card text-center p-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">View Messages</h5>
                    <a href="admin_messages.php" class="btn btn-primary px-4">Go</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
