<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'login.html';</script>";
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'])) {
    $con = new mysqli("localhost", "arhan", "@Arhan1234#!", "trade_buddy");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $customer_id = $_SESSION['customer_id'];
    $product_name = $con->real_escape_string($_POST['product_name']);
    $sql = "DELETE FROM products WHERE customer_id = $customer_id AND product_name = '$product_name'";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully.'); window.location.href = 'profile.php';</script>";
    } else {
        echo "<script>alert('Error deleting product: " . $con->error . "'); window.location.href = 'profile.php';</script>";
    }
    $con->close();
} else {
    header('Location: profile.php');
    exit();
}
?>
