<?php
/*  Trade Buddy – Listings API
 *
 *  GET  /api/listings.php          – fetch all listings (products + donations + wanted)
 *  POST /api/listings.php          – create a listing (multipart/form-data for images)
 *       Required fields: type, title, category
 *       Optional: price, condition, location, description, image (file)
 */
require __DIR__ . '/config.php';

$BASE_URL = 'https://mytradebuddy.com';

// ==================== GET: Fetch all listings ====================
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = getDB();
    $listings = [];

    // --- Products (Sell) ---
    $sql = "SELECT p.id, p.product_name, p.product_description, p.price, p.image,
                   p.category, p.condition_text, p.location_text, p.created_at,
                   c.parent_name AS seller_name, c.email AS seller_email
            FROM products p
            JOIN customers c ON p.customer_id = c.id
            WHERE p.is_active = 1
            ORDER BY p.id DESC";
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $listings[] = [
                'id'          => 'sell_' . $row['id'],
                'type'        => 'Sell',
                'title'       => $row['product_name'],
                'price'       => (float) $row['price'],
                'category'    => $row['category'] ?: 'Other',
                'condition'   => $row['condition_text'] ?: 'Good',
                'location'    => $row['location_text'] ?: '',
                'description' => $row['product_description'] ?: '',
                'imageUri'    => $row['image'] ? $BASE_URL . '/uploads/' . $row['image'] : null,
                'createdAt'   => $row['created_at'] ? strtotime($row['created_at']) * 1000 : null,
                'sellerName'  => $row['seller_name'],
                'sellerEmail' => $row['seller_email'],
            ];
        }
    }

    // --- Donations (Donate) ---
    $sql = "SELECT d.id, d.item_name, d.description, d.category, d.item_condition,
                   d.pickup_location, d.image, d.created_at,
                   c.parent_name AS seller_name, c.email AS seller_email
            FROM donations d
            JOIN customers c ON d.customer_id = c.id
            ORDER BY d.id DESC";
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $listings[] = [
                'id'          => 'donate_' . $row['id'],
                'type'        => 'Donate',
                'title'       => $row['item_name'],
                'price'       => 0,
                'category'    => $row['category'] ?: 'Other',
                'condition'   => $row['item_condition'] ?: 'Good',
                'location'    => $row['pickup_location'] ?: '',
                'description' => $row['description'] ?: '',
                'imageUri'    => $row['image'] ? $BASE_URL . '/uploads/' . $row['image'] : null,
                'createdAt'   => $row['created_at'] ? strtotime($row['created_at']) * 1000 : null,
                'sellerName'  => $row['seller_name'],
                'sellerEmail' => $row['seller_email'],
            ];
        }
    }

    // --- Wanted Items ---
    $sql = "SELECT w.id, w.item_name, w.description, w.category, w.size_edition,
                   w.contact_info, w.image, w.created_at,
                   c.parent_name AS seller_name, c.email AS seller_email
            FROM wanted_items w
            JOIN customers c ON w.customer_id = c.id
            ORDER BY w.id DESC";
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $listings[] = [
                'id'          => 'wanted_' . $row['id'],
                'type'        => 'Wanted',
                'title'       => $row['item_name'],
                'price'       => null,
                'category'    => $row['category'] ?: 'Other',
                'condition'   => 'Any',
                'location'    => '',
                'description' => $row['description'] ?: '',
                'imageUri'    => $row['image'] ? $BASE_URL . '/uploads/' . $row['image'] : null,
                'createdAt'   => $row['created_at'] ? strtotime($row['created_at']) * 1000 : null,
                'sellerName'  => $row['seller_name'],
                'sellerEmail' => $row['seller_email'],
            ];
        }
    }

    // Sort all listings by createdAt descending (newest first)
    usort($listings, function ($a, $b) {
        return ($b['createdAt'] ?? 0) - ($a['createdAt'] ?? 0);
    });

    $conn->close();
    jsonSuccess(['listings' => $listings]);
}

// ==================== POST: Create a listing ====================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = requireAuth();
    $conn = getDB();

    // Support both JSON body and form-data (for image uploads)
    $type        = $_POST['type']        ?? '';
    $title       = trim($_POST['title']       ?? '');
    $price       = $_POST['price']       ?? null;
    $category    = trim($_POST['category']    ?? 'Other');
    $condition   = trim($_POST['condition']   ?? 'Good');
    $location    = trim($_POST['location']    ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($title === '') {
        jsonError('Title is required');
    }
    if (!in_array($type, ['Sell', 'Donate', 'Wanted'])) {
        jsonError('Type must be Sell, Donate, or Wanted');
    }

    // Handle image upload
    $imageName = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($_FILES['image']['type'], $allowed)) {
            jsonError('Invalid image type');
        }
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $uploadDir = dirname(__DIR__) . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName)) {
            jsonError('Failed to upload image');
        }
    }

    // Get customer email for contact_info fields
    $stmt = $conn->prepare('SELECT email FROM customers WHERE id = ?');
    $stmt->bind_param('i', $customerId);
    $stmt->execute();
    $customerEmail = $stmt->get_result()->fetch_assoc()['email'] ?? '';
    $stmt->close();

    $newId = null;

    // --- Route to correct table based on type ---
    if ($type === 'Sell') {
        $p = ($price !== null && $price !== '') ? (float) $price : 0;
        $stmt = $conn->prepare(
            'INSERT INTO products (customer_id, product_name, product_description, price, image, category, condition_text, location_text)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->bind_param('issdssss', $customerId, $title, $description, $p, $imageName, $category, $condition, $location);
        $stmt->execute();
        $newId = 'sell_' . $stmt->insert_id;
        $stmt->close();

    } elseif ($type === 'Donate') {
        $today = date('Y-m-d');
        $stmt = $conn->prepare(
            'INSERT INTO donations (customer_id, item_name, category, item_condition, pickup_location, availability_date, contact_info, description, image, created_at)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())'
        );
        $stmt->bind_param('issssssss', $customerId, $title, $category, $condition, $location, $today, $customerEmail, $description, $imageName);
        $stmt->execute();
        $newId = 'donate_' . $stmt->insert_id;
        $stmt->close();

    } elseif ($type === 'Wanted') {
        $stmt = $conn->prepare(
            'INSERT INTO wanted_items (customer_id, item_name, category, size_edition, contact_info, description, image, created_at)
             VALUES (?, ?, ?, ?, ?, ?, ?, NOW())'
        );
        $sizeEdition = $condition !== 'Any' ? $condition : '';
        $stmt->bind_param('issssss', $customerId, $title, $category, $sizeEdition, $customerEmail, $description, $imageName);
        $stmt->execute();
        $newId = 'wanted_' . $stmt->insert_id;
        $stmt->close();
    }

    $conn->close();

    jsonSuccess([
        'listing' => [
            'id'          => $newId,
            'type'        => $type,
            'title'       => $title,
            'price'       => $type === 'Sell' ? (float)($price ?? 0) : ($type === 'Donate' ? 0 : null),
            'category'    => $category,
            'condition'   => $condition,
            'location'    => $location,
            'description' => $description,
            'imageUri'    => $imageName ? $BASE_URL . '/uploads/' . $imageName : null,
            'createdAt'   => round(microtime(true) * 1000),
        ],
    ], 201);
}

jsonError('Method not allowed', 405);
