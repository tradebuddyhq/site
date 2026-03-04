<?php
include "db_connect.php"; // Database connection file

$sql = "SELECT items.*, customer.username FROM items 
        JOIN customer ON items.customer_id = customer.id 
        ORDER BY created_at DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
    echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
    echo "<p>Price: $" . $row["price"] . "</p>";
    echo "<p>Posted by: " . htmlspecialchars($row["username"]) . "</p>";
    echo "<img src='" . $row["image"] . "' width='200'><br>";
    echo "</div><hr>";
}
?>
