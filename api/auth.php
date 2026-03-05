<?php
/*  Trade Buddy – Auth API
 *
 *  POST /api/auth.php?action=signup   { name, email, password }
 *  POST /api/auth.php?action=login    { email, password }
 *  POST /api/auth.php?action=logout   (Bearer token)
 */
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonError('POST required', 405);
}

$action = $_GET['action'] ?? '';
$body   = jsonBody();

// ---------- Helper: create token & return session ----------
function createTokenAndRespond($conn, $customerId, $name, $email) {
    $token = bin2hex(random_bytes(32));

    $stmt = $conn->prepare('INSERT INTO api_tokens (customer_id, token) VALUES (?, ?)');
    $stmt->bind_param('is', $customerId, $token);
    $stmt->execute();
    $stmt->close();

    jsonSuccess([
        'token' => $token,
        'user'  => [
            'id'    => $customerId,
            'name'  => $name,
            'email' => $email,
        ],
    ]);
}

// ==================== SIGNUP ====================
if ($action === 'signup') {
    $name     = trim($body['name']     ?? '');
    $email    = strtolower(trim($body['email'] ?? ''));
    $password = $body['password'] ?? '';

    if ($name === '' || $email === '' || $password === '') {
        jsonError('Name, email and password are required');
    }

    $conn = getDB();

    // Check duplicate
    $stmt = $conn->prepare('SELECT id FROM customers WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->close();
        jsonError('Email already registered');
    }
    $stmt->close();

    // Insert customer (matches existing website schema)
    $terms = 1;
    $grade = '';
    $stmt = $conn->prepare('INSERT INTO customers (parent_name, email, password, child_year_grade, terms_accepted) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssi', $name, $email, $password, $grade, $terms);
    if (!$stmt->execute()) {
        jsonError('Could not create account');
    }
    $customerId = $stmt->insert_id;
    $stmt->close();

    createTokenAndRespond($conn, $customerId, $name, $email);
}

// ==================== LOGIN ====================
if ($action === 'login') {
    $email    = strtolower(trim($body['email'] ?? ''));
    $password = $body['password'] ?? '';

    if ($email === '' || $password === '') {
        jsonError('Email and password are required');
    }

    $conn = getDB();
    $stmt = $conn->prepare('SELECT id, parent_name, password FROM customers WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if (!$row || $password !== $row['password']) {
        jsonError('Invalid email or password');
    }

    createTokenAndRespond($conn, (int)$row['id'], $row['parent_name'], $email);
}

// ==================== LOGOUT ====================
if ($action === 'logout') {
    $header = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
    if (preg_match('/^Bearer\s+(.+)$/i', $header, $m)) {
        $conn = getDB();
        $stmt = $conn->prepare('DELETE FROM api_tokens WHERE token = ?');
        $stmt->bind_param('s', $m[1]);
        $stmt->execute();
        $stmt->close();
    }
    jsonSuccess(['message' => 'Logged out']);
}

jsonError('Invalid action. Use ?action=signup, login, or logout');
