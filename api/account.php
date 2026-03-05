<?php
/*  Trade Buddy – Account API
 *
 *  POST /api/account.php?action=delete   (Bearer token) – permanently deletes the user's account
 */
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonError('POST required', 405);
}

$action = $_GET['action'] ?? '';

if ($action === 'delete') {
    $customerId = requireAuth();
    $conn = getDB();

    // Delete user's listings from all tables (CASCADE should handle this,
    // but be explicit to also clean up uploaded images)
    $tables = [
        'products'        => 'image',
        'donations'       => 'image',
        'wanted_items'    => 'image',
        'lost_found_items' => 'image',
    ];

    $uploadDir = dirname(__DIR__) . '/uploads/';

    foreach ($tables as $table => $imageCol) {
        // Delete associated images from filesystem
        $stmt = $conn->prepare("SELECT $imageCol FROM $table WHERE customer_id = ?");
        $stmt->bind_param('i', $customerId);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            if ($row[$imageCol] && file_exists($uploadDir . $row[$imageCol])) {
                unlink($uploadDir . $row[$imageCol]);
            }
        }
        $stmt->close();
    }

    // Delete the customer (CASCADE will remove products, messages, tokens, etc.)
    $stmt = $conn->prepare('DELETE FROM customers WHERE id = ?');
    $stmt->bind_param('i', $customerId);
    $stmt->execute();
    $stmt->close();

    $conn->close();
    jsonSuccess(['message' => 'Account deleted']);
}

jsonError('Invalid action. Use ?action=delete');
