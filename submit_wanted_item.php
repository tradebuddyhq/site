<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header('Location: login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connect.php';
    
    $customer_id = $_SESSION['customer_id'];
    $item_name = $conn->real_escape_string($_POST['item_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $size_edition = $conn->real_escape_string($_POST['size_edition']);
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
    $sql = "INSERT INTO wanted_items (customer_id, item_name, category, size_edition, contact_info, description, image, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $customer_id, $item_name, $category, $size_edition, $contact_info, $description, $image_name);
    
    if ($stmt->execute()) {
        echo "<script>alert('Wanted item posted successfully!'); window.location.href = 'wanted-items.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>
