<?php
session_start();
$con = new mysqli("localhost", "root", "", "trade_buddy");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sender_id = $_SESSION['customer_id'];
$receiver_id = $_POST['receiver_id'];
$product_id = $_POST['product_id'];
$message = $con->real_escape_string($_POST['message']);

$conversation_id = min($sender_id, $receiver_id) . "_" . max($sender_id, $receiver_id) . "_" . $product_id;

$sql = "INSERT INTO messages (sender_id, receiver_id, product_id, message, is_read, created_at, conversation_id)
        VALUES ('$sender_id', '$receiver_id', '$product_id', '$message', 0, NOW(), '$conversation_id')";

if ($con->query($sql) === TRUE) {
    echo "Message sent";
} else {
    echo "Error: " . $con->error;
}

$con->close();
?>

