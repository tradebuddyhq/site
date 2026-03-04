<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header('Location: login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connect.php';
    
    $customer_id = $_SESSION['customer_id'];
    $item_type = 'Found'; // This is specifically for found items
    $item_name = $conn->real_escape_string($_POST['item_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $location = $conn->real_escape_string($_POST['location']);
    $date_reported = $conn->real_escape_string($_POST['date_found']);
    $contact_info = $conn->real_escape_string($_POST['contact_info']);
    $description = $conn->real_escape_string($_POST['description']);
    
    // Handle image upload
    $image_name = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        $file_type = $_FILES['image']['type'];
        
        if (in_array($file_type, $allowed_types)) {
            $image_name = time() . '_' . basename($_FILES['image']['name']);
            $upload_path = 'uploads/' . $image_name;
            
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                echo "<script>alert('Error uploading image.'); window.history.back();</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid image type. Only JPG, PNG, and GIF allowed.'); window.history.back();</script>";
            exit();
        }
    }
    
    // Insert into database
    $sql = "INSERT INTO lost_found_items (customer_id, item_type, item_name, category, location, date_reported, contact_info, description, image, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssss", $customer_id, $item_type, $item_name, $category, $location, $date_reported, $contact_info, $description, $image_name);
    
    if ($stmt->execute()) {
        echo "<script>alert('Found item reported successfully!'); window.location.href = 'lost-found.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>
