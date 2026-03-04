<?php
// admin_product_grant.php (activate product)
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}
require 'db_connect.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("UPDATE products SET is_active=1 WHERE id=$id");
}
header('Location: admin_products.php');
exit();
