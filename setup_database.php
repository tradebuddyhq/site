<?php
/**
 * Database Setup Script
 * Run this file once to create the wanted_items and lost_found_items tables
 * Access via: http://localhost/your-path/setup_database.php
 */

require 'db_connect.php';

echo "<h2>Trade Buddy Database Setup</h2>";
echo "<p>Creating tables for Wanted Items and Lost & Found functionality...</p>";

// Create wanted_items table
$sql_wanted = "CREATE TABLE IF NOT EXISTS `wanted_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `size_edition` varchar(100) DEFAULT NULL,
  `contact_info` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($sql_wanted) === TRUE) {
    echo "<p style='color: green;'>✓ Table 'wanted_items' created successfully</p>";
} else {
    echo "<p style='color: red;'>✗ Error creating wanted_items table: " . $conn->error . "</p>";
}

// Create lost_found_items table
$sql_lost_found = "CREATE TABLE IF NOT EXISTS `lost_found_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `item_type` enum('Lost','Found') NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_reported` date NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `item_type` (`item_type`),
  FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($sql_lost_found) === TRUE) {
    echo "<p style='color: green;'>✓ Table 'lost_found_items' created successfully</p>";
} else {
    echo "<p style='color: red;'>✗ Error creating lost_found_items table: " . $conn->error . "</p>";
}

// Verify uploads directory exists
if (!file_exists('uploads')) {
    if (mkdir('uploads', 0777, true)) {
        echo "<p style='color: green;'>✓ Directory 'uploads' created successfully</p>";
    } else {
        echo "<p style='color: orange;'>⚠ Warning: Could not create uploads directory. Please create it manually.</p>";
    }
} else {
    echo "<p style='color: green;'>✓ Directory 'uploads' already exists</p>";
}

echo "<hr>";
echo "<h3>Setup Complete!</h3>";
echo "<p>Your database tables are ready. You can now:</p>";
echo "<ul>";
echo "<li><a href='wanted-items.php'>Visit Wanted Items Page</a></li>";
echo "<li><a href='lost-found.php'>Visit Lost & Found Page</a></li>";
echo "<li><a href='admin_wanted_items.php'>Admin: Manage Wanted Items</a></li>";
echo "<li><a href='admin_lost_found.php'>Admin: Manage Lost & Found</a></li>";
echo "</ul>";
echo "<p style='color: red;'><strong>Important:</strong> For security reasons, delete this file (setup_database.php) after running it.</p>";

$conn->close();
?>
