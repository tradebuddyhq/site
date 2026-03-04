<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: login.html');
    exit();
}

require 'db_connect.php';

// Get all lost and found items with customer details
$sql = "SELECT lf.*, c.parent_name, c.email, c.child_year_grade 
        FROM lost_found_items lf 
        JOIN customers c ON lf.customer_id = c.id 
        ORDER BY lf.created_at DESC";
$result = $conn->query($sql);

// Handle delete action
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    // Get image name before deleting
    $img_sql = "SELECT image FROM lost_found_items WHERE id = ?";
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
    $del_sql = "DELETE FROM lost_found_items WHERE id = ?";
    $del_stmt = $conn->prepare($del_sql);
    $del_stmt->bind_param("i", $id);
    
    if ($del_stmt->execute()) {
        echo "<script>alert('Item deleted successfully!'); window.location.href = 'admin_lost_found.php';</script>";
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
    <title>Admin - Lost & Found | Trade Buddy</title>
    
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
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
        
        .badge-lost {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            color: #333;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
        }
        
        .badge-found {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            color: #333;
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
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
        <h2><i class="bi bi-search"></i> Manage Lost & Found Items</h2>
        <p class="mb-0">View and manage all lost and found reports from parents</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><i class="bi bi-inbox"></i> Total Reports: <span class="badge bg-primary"><?php echo $result->num_rows; ?></span></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><i class="bi bi-exclamation-triangle"></i> Lost Items: 
                        <span class="badge-lost">
                            <?php 
                            $result_copy = $conn->query($sql);
                            $lost_count = 0;
                            while ($r = $result_copy->fetch_assoc()) {
                                if ($r['item_type'] == 'Lost') $lost_count++;
                            }
                            echo $lost_count;
                            ?>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><i class="bi bi-check-circle"></i> Found Items: 
                        <span class="badge-found">
                            <?php echo $result->num_rows - $lost_count; ?>
                        </span>
                    </h5>
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
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                                <span class="<?php echo $row['item_type'] == 'Lost' ? 'badge-lost' : 'badge-found'; ?>">
                                    <?php echo strtoupper($row['item_type']); ?>
                                </span>
                            </div>
                            
                            <p class="text-muted mb-2">
                                <i class="bi bi-tag"></i> <?php echo htmlspecialchars($row['category']); ?>
                            </p>
                            <p class="mb-2"><i class="bi bi-geo-alt"></i> <strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                            <p class="mb-2"><i class="bi bi-calendar"></i> <strong>Date:</strong> <?php echo date('M d, Y', strtotime($row['date_reported'])); ?></p>
                            <p class="mb-2"><strong>Description:</strong><br><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                            
                            <hr>
                            
                            <p class="mb-1"><strong>Reported by:</strong> <?php echo htmlspecialchars($row['parent_name']); ?></p>
                            <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                            <?php if ($row['child_year_grade']): ?>
                                <p class="mb-1"><strong>Year Group:</strong> <?php echo htmlspecialchars($row['child_year_grade']); ?></p>
                            <?php endif; ?>
                            <p class="mb-3"><strong>Contact:</strong> <?php echo htmlspecialchars($row['contact_info']); ?></p>
                            
                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-delete w-100" onclick="return confirm('Are you sure you want to delete this report?');">
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
                    <h4 class="mt-3 text-muted">No reports yet</h4>
                    <p class="text-muted">Lost and found reports will appear here</p>
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
