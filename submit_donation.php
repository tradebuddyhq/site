<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header('Location: login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connect.php';

    $customer_id = $_SESSION['customer_id'];
    $item_name = trim($_POST['item_name'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $item_condition = trim($_POST['item_condition'] ?? '');
    $pickup_location = trim($_POST['pickup_location'] ?? '');
    $availability_date = trim($_POST['availability_date'] ?? '');
    $contact_info = trim($_POST['contact_info'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Basic required field check
    if ($item_name === '' || $category === '' || $item_condition === '' || $pickup_location === '' || $availability_date === '' || $contact_info === '' || $description === '') {
        header('Location: donate.php?error=missing');
        exit();
    }

    // Sanitize for DB
    $item_name = $conn->real_escape_string($item_name);
    $category = $conn->real_escape_string($category);
    $item_condition = $conn->real_escape_string($item_condition);
    $pickup_location = $conn->real_escape_string($pickup_location);
    $availability_date = $conn->real_escape_string($availability_date);
    $contact_info = $conn->real_escape_string($contact_info);
    $description = $conn->real_escape_string($description);

    // Handle optional image upload
    $image_name = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        $file_type = $_FILES['image']['type'];

        if (in_array($file_type, $allowed_types, true)) {
            $image_name = time() . '_' . basename($_FILES['image']['name']);
            $upload_path = 'uploads/' . $image_name;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                header('Location: donate.php?error=upload');
                exit();
            }
        } else {
            header('Location: donate.php?error=type');
            exit();
        }
    }

    $sql = "INSERT INTO donations (customer_id, item_name, category, item_condition, pickup_location, availability_date, contact_info, description, image, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issssssss', $customer_id, $item_name, $category, $item_condition, $pickup_location, $availability_date, $contact_info, $description, $image_name);

    if ($stmt->execute()) {
        header('Location: donate.php?success=1');
    } else {
        header('Location: donate.php?error=db');
    }

    $stmt->close();
    $conn->close();
}
?>
