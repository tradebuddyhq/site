<?php
/*  One-time migration: run this once on your server to set up the API.
 *  Visit: https://mytradebuddy.com/api/migrate.php
 *  Delete this file after running it.
 */
require __DIR__ . '/config.php';

$conn = getDB();
$results = [];

// 1. Create api_tokens table
$sql1 = "CREATE TABLE IF NOT EXISTS api_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
if ($conn->query($sql1)) {
    $results[] = 'api_tokens table: OK';
} else {
    $results[] = 'api_tokens table: ' . $conn->error;
}

// 2. Add condition_text column to products (if missing)
$check = $conn->query("SHOW COLUMNS FROM products LIKE 'condition_text'");
if ($check->num_rows === 0) {
    if ($conn->query("ALTER TABLE products ADD COLUMN condition_text VARCHAR(100) DEFAULT 'Good'")) {
        $results[] = 'products.condition_text column: ADDED';
    } else {
        $results[] = 'products.condition_text column: ' . $conn->error;
    }
} else {
    $results[] = 'products.condition_text column: already exists';
}

// 3. Add location_text column to products (if missing)
$check = $conn->query("SHOW COLUMNS FROM products LIKE 'location_text'");
if ($check->num_rows === 0) {
    if ($conn->query("ALTER TABLE products ADD COLUMN location_text VARCHAR(255) DEFAULT ''")) {
        $results[] = 'products.location_text column: ADDED';
    } else {
        $results[] = 'products.location_text column: ' . $conn->error;
    }
} else {
    $results[] = 'products.location_text column: already exists';
}

// 4. Add created_at column to products (if missing)
$check = $conn->query("SHOW COLUMNS FROM products LIKE 'created_at'");
if ($check->num_rows === 0) {
    if ($conn->query("ALTER TABLE products ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP")) {
        $results[] = 'products.created_at column: ADDED';
    } else {
        $results[] = 'products.created_at column: ' . $conn->error;
    }
} else {
    $results[] = 'products.created_at column: already exists';
}

$conn->close();

jsonSuccess(['migrations' => $results]);
