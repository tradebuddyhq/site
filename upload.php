<?php
session_start();
include 'db_connect.php'; // Ensure you have a file to connect to the database

if (!isset($_SESSION['customer_id'])) {
    die("<script>alert('You must be logged in to upload a product.'); window.location.href='login.php';</script>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_SESSION['customer_id']; 
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $price = floatval($_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']); // Category field

    // Image Upload Handling
    $target_dir = "uploads/";
    $image_name = basename($_FILES["product_image"]["name"]);
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        // Insert Product into Database with category
        $sql = "INSERT INTO products (customer_id, product_name, product_description, price, image, category) 
                VALUES ('$customer_id', '$product_name', '$product_description', '$price', '$image_name', '$category')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Product uploaded successfully!'); window.location.href='profile.php';</script>";
        } else {
            echo "<script>alert('Database error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .upload-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .preview-img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>

<body>
<?php include 'navbar.php'; ?>

<div class="container">
    <div class="upload-card mx-auto col-md-6">
        <h3 class="text-center">Upload Product</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-control" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Game">Game</option>
                    <option value="Household">Household</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Jewelry">Jewelry</option>
                    <option value="Sports">Sports</option>
                     <option value="School Uniform">School Uniform</option>
                    <option value="Toys">Toys</option>
                    <option value="Books">Books</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Product Description</label>
                <textarea name="product_description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price (AED)</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" accept="image/*" required>
                <img id="imagePreview" class="preview-img">
            </div>
            <button type="submit" class="btn btn-primary w-100">Upload Product</button>
        </form>
    </div>
</div>

<script>
    document.getElementById("product_image").addEventListener("change", function(event) {
        const preview = document.getElementById("imagePreview");
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>
</body>
</html>
