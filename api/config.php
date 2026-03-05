<?php
/*  Trade Buddy – shared API helpers
 *  Included by every api/*.php endpoint.
 */

// ---------- CORS (allow mobile app requests) ----------
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// ---------- Database connection ----------
$DB_HOST = 'localhost';
$DB_USER = 'arhan';
$DB_PASS = '@Arhan1234#!';
$DB_NAME = 'trade_buddy';

function getDB() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($conn->connect_error) {
        jsonError('Database connection failed', 500);
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}

// ---------- JSON helpers ----------
function jsonSuccess($data = [], $code = 200) {
    http_response_code($code);
    echo json_encode(array_merge(['success' => true], $data), JSON_UNESCAPED_UNICODE);
    exit;
}

function jsonError($message, $code = 400) {
    http_response_code($code);
    echo json_encode(['success' => false, 'error' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

// ---------- Auth helper – validate Bearer token ----------
function requireAuth() {
    $header = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
    if (!preg_match('/^Bearer\s+(.+)$/i', $header, $m)) {
        jsonError('Missing or invalid Authorization header', 401);
    }
    $token = $m[1];

    $conn = getDB();
    $stmt = $conn->prepare('SELECT customer_id FROM api_tokens WHERE token = ?');
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if (!$row) {
        jsonError('Invalid token', 401);
    }
    return (int) $row['customer_id'];
}

// ---------- Read JSON body ----------
function jsonBody() {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}
