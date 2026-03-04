<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['customer_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'login.html';</script>";
    exit();
}

$con = new mysqli("localhost", "root", "", "trade_buddy");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$seller_id = $_SESSION['customer_id'];

// Fetch all messages where the seller is the receiver for a specific product
$sql = "SELECT m.id, m.sender_id, m.receiver_id, m.product_id, m.message, m.is_read, m.created_at, 
               p.product_name, c.parent_name AS sender_name
        FROM messages m
        JOIN customers c ON m.sender_id = c.id
        JOIN products p ON m.product_id = p.id
        WHERE m.receiver_id = $seller_id
        ORDER BY m.created_at DESC";

$messagesResult = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .message-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            border-left: 5px solid #007bff;
        }

        .unread {
            background-color: #d1ecf1;
            border-left-color: #17a2b8;
        }

        .reply-box {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .message-content {
            word-wrap: break-word;
            max-width: 80%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Your Messages</h2>

    <?php if ($messagesResult->num_rows > 0): ?>
        <?php while ($msg = $messagesResult->fetch_assoc()): ?>
            <div class="message-card <?php echo $msg['is_read'] ? '' : 'unread'; ?>">
                <p><strong>From:</strong> <?php echo htmlspecialchars($msg['sender_name']); ?></p>
                <p><strong>Product:</strong> <?php echo htmlspecialchars($msg['product_name']); ?></p>
                <p class="message-content"><strong>Message:</strong> <?php echo htmlspecialchars($msg['message']); ?></p>
                <p><small><?php echo $msg['created_at']; ?></small></p>

                <!-- Reply Form -->
                <form action="reply.php" method="POST" class="reply-box">
                    <input type="hidden" name="message_id" value="<?php echo $msg['id']; ?>">
                    <input type="hidden" name="receiver_id" value="<?php echo $msg['sender_id']; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $msg['product_id']; ?>">
                    <input type="text" name="reply_message" class="form-control" placeholder="Type your reply..." required>
                    <button type="submit" class="btn btn-primary">Reply</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No messages found.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Mark messages as read when viewed
$con->query("UPDATE messages SET is_read = 1 WHERE receiver_id = $seller_id");

$con->close();
?>
