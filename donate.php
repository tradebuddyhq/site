<?php
session_start();
// Allow access if a customer is logged in or an admin is logged in
if (!isset($_SESSION['customer_id']) && empty($_SESSION['admin_logged_in'])) {
    header('Location: login.html');
    exit();
}

require 'db_connect.php';
$donations = $conn->query("SELECT item_name, category, item_condition, pickup_location, availability_date, contact_info, description, image, created_at FROM donations ORDER BY created_at DESC");
$success = isset($_GET['success']);
$error = $_GET['error'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate | Trade Buddy</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa 0%, #fff1f0 100%);
            font-family: 'Poppins', sans-serif;
        }
        .hero {
            background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
            color: white;
            padding: 60px 0;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .form-card, .list-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .badge-soft {
            background: rgba(0, 206, 201, 0.15);
            color: #00695c;
            border-radius: 30px;
            padding: 6px 14px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .donation-image {
            max-height: 180px;
            object-fit: cover;
            width: 100%;
            border-radius: 12px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<section class="hero text-center">
    <div class="container">
        <h1 class="mb-3"><i class="bi bi-box-seam"></i> Donate Items</h1>
        <p class="lead mb-0">Give pre-loved items a second life by sharing them with the community.</p>
    </div>
</section>

<div class="container my-5">
    <?php if ($success): ?>
        <div class="alert alert-success">Thank you! Your donated item has been posted.</div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger">There was a problem saving your donation. Please try again.</div>
    <?php endif; ?>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card form-card p-4 h-100">
                <h4 class="mb-3">Share a Donation</h4>
                <form method="POST" action="submit_donation.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Item Name *</label>
                        <input type="text" class="form-control" name="item_name" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select</option>
                                <option value="Clothing">Clothing</option>
                                <option value="Books">Books</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Toys">Toys</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Condition *</label>
                            <select class="form-select" name="item_condition" required>
                                <option value="">Select</option>
                                <option value="New">New</option>
                                <option value="Like New">Like New</option>
                                <option value="Good">Good</option>
                                <option value="Fair">Fair</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <label class="form-label">Pickup Location *</label>
                            <input type="text" class="form-control" name="pickup_location" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Available From *</label>
                            <input type="date" class="form-control" name="availability_date" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Contact Info *</label>
                        <input type="text" class="form-control" name="contact_info" placeholder="Email or phone" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Description *</label>
                        <textarea class="form-control" name="description" rows="4" required placeholder="Add helpful details..." ></textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Image (optional)</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <small class="text-muted">JPG, PNG, or GIF</small>
                    </div>
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">Post Donation</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card list-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Available Donations</h4>
                    <span class="badge-soft"><i class="bi bi-clock"></i> Latest first</span>
                </div>
                <div class="row g-3">
                    <?php if ($donations && $donations->num_rows > 0): ?>
                        <?php while ($row = $donations->fetch_assoc()): ?>
                            <div class="col-12">
                                <div class="border rounded-4 p-3 h-100 bg-white">
                                    <div class="d-flex flex-wrap gap-3">
                                        <?php if (!empty($row['image'])): ?>
                                            <div style="flex: 0 0 180px;">
                                                <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Donation Image" class="donation-image">
                                            </div>
                                        <?php endif; ?>
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <h5 class="mb-0"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                                                <span class="badge-soft"><?php echo htmlspecialchars($row['category']); ?></span>
                                                <span class="badge-soft">Condition: <?php echo htmlspecialchars($row['item_condition']); ?></span>
                                            </div>
                                            <p class="text-muted mb-2">
                                                <i class="bi bi-geo-alt"></i> <?php echo htmlspecialchars($row['pickup_location']); ?>
                                                &nbsp;|&nbsp; <i class="bi bi-calendar-event"></i> Available from <?php echo htmlspecialchars($row['availability_date']); ?>
                                            </p>
                                            <p class="mb-2"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                                            <small class="text-muted"><i class="bi bi-telephone"></i> Contact: <?php echo htmlspecialchars($row['contact_info']); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info mb-0">No donations yet. Be the first to share an item!</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php $conn->close(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
