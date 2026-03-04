<?php
session_start();
include 'db_connect.php';

// Check if the user is logged in
if (!isset($_SESSION['customer_id'])) {
    die("<script>alert('You must be logged in to chat.'); window.location.href='login.php';</script>");
}

// Get the seller's ID from the URL parameter
$seller_id = isset($_GET['seller_id']) ? intval($_GET['seller_id']) : 0;

if ($seller_id == 0) {
    die("<script>alert('Invalid seller.'); window.location.href='index.php';</script>");
}

$buyer_id = $_SESSION['customer_id']; // Current logged-in user (buyer)

// Fetch existing messages between buyer and seller
$sql = "SELECT * FROM messages 
        WHERE (sender_id = $buyer_id AND receiver_id = $seller_id) 
        OR (sender_id = $seller_id AND receiver_id = $buyer_id)
        ORDER BY created_at ASC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Seller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .chat-box {
            max-height: 400px;
            overflow-y: scroll;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .chat-message {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .sender {
            background-color: #d1e7dd;
            text-align: left;
        }
        .receiver {
            background-color: #f8d7da;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h3 class="text-center">Chat with Seller</h3>
    
    <div class="chat-box mb-3">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="chat-message <?php echo $row['sender_id'] == $buyer_id ? 'sender' : 'receiver'; ?>">
                <strong><?php echo ($row['sender_id'] == $buyer_id) ? 'You' : 'Seller'; ?>:</strong>
                <p><?php echo $row['message']; ?></p>
                <small><?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?></small>
            </div>
        <?php } ?>
    </div>

    <form action="chat.php?seller_id=<?php echo $seller_id; ?>" method="POST">
        <div class="mb-3">
            <textarea name="message" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and send the message
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $created_at = date("Y-m-d H:i:s");

    $insert_sql = "INSERT INTO messages (sender_id, receiver_id, product_id, message, is_read, created_at) 
                   VALUES ('$buyer_id', '$seller_id', NULL, '$message', 0, '$created_at')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>window.location.href = 'chat.php?seller_id=$seller_id';</script>";
    } else {
        echo "<script>alert('Error sending message: " . $conn->error . "');</script>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
