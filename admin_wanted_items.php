<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: login.html');
    exit();
}

require 'db_connect.php';

// Get all wanted items with customer details
$sql = "SELECT wi.*, c.parent_name, c.email, c.child_year_grade 
        FROM wanted_items wi 
        JOIN customers c ON wi.customer_id = c.id 
        ORDER BY wi.created_at DESC";
$result = $conn->query($sql);

// Handle delete action
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    // Get image name before deleting
    $img_sql = "SELECT image FROM wanted_items WHERE id = ?";
    $img_stmt = $conn->prepare($img_sql);
    $img_stmt->bind_param("i", $id);
    $img_stmt->execute();
    $img_result = $img_stmt->get_result();
    
    if ($row = $img_result->fetch_assoc()) {
        // Delete image file if exists
        if ($row['image'] && file_exists('uploads/' . $row['image'])) {
            unlink('uploads/' . $row['image']);
        }
    }
    
    // Delete from database
    $del_sql = "DELETE FROM wanted_items WHERE id = ?";
    $del_stmt = $conn->prepare($del_sql);
    $del_stmt->bind_param("i", $id);
    
    if ($del_stmt->execute()) {
        echo "<script>alert('Wanted item deleted successfully!'); window.location.href = 'admin_wanted_items.php';</script>";
    } else {
        echo "<script>alert('Error deleting item.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Wanted Items | Trade Buddy</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: #f5f7fa;
        }
        
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            border: none;
            color: white;
        }
        
        .btn-delete:hover {
            background: linear-gradient(135deg, #ee5a6f 0%, #ff6b6b 100%);
            color: white;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="admin-header">
    <div class="container">
        <h2><i class="bi bi-search-heart"></i> Manage Wanted Items</h2>
        <p class="mb-0">View and manage all wanted item requests from parents</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5><i class="bi bi-info-circle"></i> Total Wanted Items: <span class="badge bg-primary"><?php echo $result->num_rows; ?></span></h5>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <?php if ($row['image']): ?>
                            <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['item_name']); ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                            <p class="text-muted mb-2">
                                <i class="bi bi-tag"></i> <?php echo htmlspecialchars($row['category']); ?>
                                <?php if ($row['size_edition']): ?>
                                    | <?php echo htmlspecialchars($row['size_edition']); ?>
                                <?php endif; ?>
                            </p>
                            <p class="mb-2"><strong>Description:</strong><br><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                            
                            <hr>
                            
                            <p class="mb-1"><strong>Posted by:</strong> <?php echo htmlspecialchars($row['parent_name']); ?></p>
                            <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                            <?php if ($row['child_year_grade']): ?>
                                <p class="mb-1"><strong>Year Group:</strong> <?php echo htmlspecialchars($row['child_year_grade']); ?></p>
                            <?php endif; ?>
                            <p class="mb-2"><strong>Contact:</strong> <?php echo htmlspecialchars($row['contact_info']); ?></p>
                            <p class="mb-3"><small class="text-muted"><i class="bi bi-calendar"></i> Posted: <?php echo date('M d, Y', strtotime($row['created_at'])); ?></small></p>
                            
                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-delete w-100" onclick="return confirm('Are you sure you want to delete this wanted item?');">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="card text-center p-5">
                    <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                    <h4 class="mt-3 text-muted">No wanted items yet</h4>
                    <p class="text-muted">Wanted item requests will appear here</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
