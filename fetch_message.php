<?php
session_start();
$con = new mysqli("localhost", "root", "", "trade_buddy");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$customer_id = $_SESSION['customer_id'];
$receiver_id = $_GET['receiver_id'];
$product_id = $_GET['product_id'];

$conversation_id = min($customer_id, $receiver_id) . "_" . max($customer_id, $receiver_id) . "_" . $product_id;

$sql = "SELECT * FROM messages WHERE conversation_id = '$conversation_id' ORDER BY created_at ASC";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    echo '<div class="message ' . ($row['sender_id'] == $customer_id ? 'sent' : 'received') . '">';
    echo '<p>' . htmlspecialchars($row['message']) . '</p>';
    echo '<small>' . $row['created_at'] . '</small>';
    echo '</div>';
}

$con->close();
?>
