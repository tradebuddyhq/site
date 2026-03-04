<?php
session_start();
// Allow access if a customer is logged in OR an admin is logged in
if (!isset($_SESSION['customer_id']) && empty($_SESSION['admin_logged_in'])) {
    header('Location: login.html');
    exit();
}
require 'db_connect.php';
$reports = $conn->query("SELECT id, item_type, item_name, category, location, date_reported, contact_info, description, image FROM lost_found_items ORDER BY created_at DESC");
?>
<?php
require 'db_connect.php';
$reports = $conn->query("SELECT id, item_type, item_name, category, location, date_reported, contact_info, description, image FROM lost_found_items ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found | Trade Buddy</title>
    
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
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            min-height: 100vh;
        }
        
        .hero-section {
                <a href="#communityReports" class="btn btn-danger w-100">View All</a>
            text-align: center;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        
        .hero-section h1 {
    <div class="row mb-5" id="communityReports">
        <div class="col-12 text-center mb-4">
            <h2 class="section-title d-inline-block">Recent Reports</h2>
        </div>

        <?php if ($reports && $reports->num_rows > 0) { ?>
            <?php while ($row = $reports->fetch_assoc()) { ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box <?php echo strtolower($row['item_type']) === 'lost' ? 'lost' : 'found'; ?>" style="width: 50px; height: 50px; margin: 0; margin-right: 15px;">
                                        <i class="bi <?php echo strtolower($row['item_type']) === 'lost' ? 'bi-exclamation-triangle' : 'bi-check-circle'; ?>" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                                        <small class="text-muted"><?php echo htmlspecialchars($row['category']); ?></small>
                                    </div>
                                </div>
                                <span class="<?php echo strtolower($row['item_type']) === 'lost' ? 'badge-lost' : 'badge-found'; ?>"><?php echo strtoupper($row['item_type']); ?></span>
                            </div>
                            <?php if (!empty($row['image'])) { ?>
                                <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Item Image" class="img-fluid rounded mb-3">
                            <?php } ?>
                            <p class="text-muted mb-2"><i class="bi bi-geo-alt"></i> <?php echo htmlspecialchars($row['location']); ?></p>
                            <p class="text-muted mb-2"><i class="bi bi-calendar"></i> <?php echo htmlspecialchars($row['date_reported']); ?></p>
                            <p class="mb-3"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                            <small class="text-muted">Contact: <?php echo htmlspecialchars($row['contact_info']); ?></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-12">
                <div class="alert alert-info text-center">No reports yet. Be the first to submit a lost or found item.</div>
            </div>
        <?php } ?>
    </div>
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
        
        .toggle-btn {
            border: 2px solid #e0e6ed;
            background: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .toggle-btn.active {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-color: transparent;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1><i class="bi bi-search"></i> Lost something? Or found an item that isn't yours?</h1>
        <p>Help the  community reconnect lost belongings with their owners.</p>
    </div>
</div>

<!-- Main Content -->
<div class="container my-5">
    
    <!-- Information Card -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="info-card">
                <p class="text-center">
                    This page is dedicated to reuniting lost items with their rightful owners.<br>
                    Parents can report a lost or found item by filling out the form below — include a brief description, where it was last seen, and when.<br><br>
                    From misplaced uniforms and books to lunchboxes and gear, this is the place to bring everything back to where it belongs.<br>
                    <strong>Trade Buddy helps keep our community connected, responsible, and sustainable.</strong>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-4 mb-3">
            <div class="card text-center p-4">
                <div class="icon-box lost">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <h5 class="mb-3">Report Lost Item</h5>
                <p class="text-muted mb-3">Lost something? Let the community know and someone might have found it.</p>
                <button class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#lostItemModal">
                    Report Lost
                </button>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card text-center p-4">
                <div class="icon-box found">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h5 class="mb-3">Report Found Item</h5>
                <p class="text-muted mb-3">Found something? Help return it to its rightful owner.</p>
                <button class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#foundItemModal">
                    Report Found
                </button>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card text-center p-4">
                <div class="icon-box" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="bi bi-list-ul" style="color: white;"></i>
                </div>
                <h5 class="mb-3">View All Reports</h5>
                <p class="text-muted mb-3">Browse all lost and found items reported by the community.</p>
                <a href="#communityReports" class="btn btn-danger w-100">View All</a>
            </div>
        </div>
    </div>
    
    <!-- Recent Reports -->
    <div class="row mb-5" id="communityReports">
        <div class="col-12 text-center mb-4">
            <h2 class="section-title d-inline-block">Recent Reports</h2>
        </div>

        <?php if ($reports && $reports->num_rows > 0) { ?>
            <?php while ($row = $reports->fetch_assoc()) { ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box <?php echo strtolower($row['item_type']) === 'lost' ? 'lost' : 'found'; ?>" style="width: 50px; height: 50px; margin: 0; margin-right: 15px;">
                                        <i class="bi <?php echo strtolower($row['item_type']) === 'lost' ? 'bi-exclamation-triangle' : 'bi-check-circle'; ?>" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                                        <small class="text-muted"><?php echo htmlspecialchars($row['category']); ?></small>
                                    </div>
                                </div>
                                <span class="<?php echo strtolower($row['item_type']) === 'lost' ? 'badge-lost' : 'badge-found'; ?>"><?php echo strtoupper($row['item_type']); ?></span>
                            </div>
                            <?php if (!empty($row['image'])) { ?>
                                <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Item Image" class="img-fluid rounded mb-3" style="max-height: 150px; object-fit: cover; width: 100%;">
                            <?php } ?>
                            <p class="text-muted mb-2"><i class="bi bi-geo-alt"></i> <?php echo htmlspecialchars($row['location']); ?></p>
                            <p class="text-muted mb-2"><i class="bi bi-calendar"></i> <?php echo htmlspecialchars($row['date_reported']); ?></p>
                            <p class="mb-3"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                            <small class="text-muted">Contact: <?php echo htmlspecialchars($row['contact_info']); ?></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-12">
                <div class="alert alert-info text-center">No reports yet. Be the first to submit a lost or found item.</div>
            </div>
        <?php } ?>
    </div>
    
</div>

<!-- Lost Item Modal -->
<div class="modal fade" id="lostItemModal" tabindex="-1" aria-labelledby="lostItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); border-radius: 20px 20px 0 0;">
                <h5 class="modal-title" id="lostItemModalLabel"><i class="bi bi-exclamation-triangle"></i> Report a Lost Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="submit_lost_item.php" enctype="multipart/form-data">
                    <input type="hidden" name="item_type" value="Lost">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="lostItemName" class="form-label"><i class="bi bi-box"></i> Item Name *</label>
                            <input type="text" class="form-control" id="lostItemName" name="item_name" required placeholder="e.g., School Backpack">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="lostCategory" class="form-label"><i class="bi bi-tag"></i> Category *</label>
                            <select class="form-select" id="lostCategory" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Uniform">Uniform</option>
                                <option value="Book">Book</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Lunchbox">Lunchbox</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="lostLocation" class="form-label"><i class="bi bi-geo-alt"></i> Last Seen Location *</label>
                            <input type="text" class="form-control" id="lostLocation" name="location" required placeholder="e.g., Library, Cafeteria">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="lostDate" class="form-label"><i class="bi bi-calendar"></i> Date Lost *</label>
                            <input type="date" class="form-control" id="lostDate" name="date_lost" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="lostContact" class="form-label"><i class="bi bi-envelope"></i> Contact Info *</label>
                            <input type="text" class="form-control" id="lostContact" name="contact_info" required placeholder="Email or Phone">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="lostDescription" class="form-label"><i class="bi bi-file-text"></i> Description *</label>
                            <textarea class="form-control" id="lostDescription" name="description" rows="4" required placeholder="Provide details about the lost item..."></textarea>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="lostImage" class="form-label"><i class="bi bi-image"></i> Upload Image</label>
                            <input type="file" class="form-control" id="lostImage" name="image" accept="image/*">
                            <small class="text-muted">Upload a photo of the item if available</small>
                        </div>
                    </div>
                    
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Submit Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Found Item Modal -->
<div class="modal fade" id="foundItemModal" tabindex="-1" aria-labelledby="foundItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); border-radius: 20px 20px 0 0;">
                <h5 class="modal-title" id="foundItemModalLabel"><i class="bi bi-check-circle"></i> Report a Found Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="submit_found_item.php" enctype="multipart/form-data">
                    <input type="hidden" name="item_type" value="Found">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="foundItemName" class="form-label"><i class="bi bi-box"></i> Item Name *</label>
                            <input type="text" class="form-control" id="foundItemName" name="item_name" required placeholder="e.g., Water Bottle">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="foundCategory" class="form-label"><i class="bi bi-tag"></i> Category *</label>
                            <select class="form-select" id="foundCategory" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Uniform">Uniform</option>
                                <option value="Book">Book</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Lunchbox">Lunchbox</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="foundLocation" class="form-label"><i class="bi bi-geo-alt"></i> Found Location *</label>
                            <input type="text" class="form-control" id="foundLocation" name="location" required placeholder="e.g., Gym, Playground">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="foundDate" class="form-label"><i class="bi bi-calendar"></i> Date Found *</label>
                            <input type="date" class="form-control" id="foundDate" name="date_found" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="foundContact" class="form-label"><i class="bi bi-envelope"></i> Contact Info *</label>
                            <input type="text" class="form-control" id="foundContact" name="contact_info" required placeholder="Email or Phone">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="foundDescription" class="form-label"><i class="bi bi-file-text"></i> Description *</label>
                            <textarea class="form-control" id="foundDescription" name="description" rows="4" required placeholder="Provide details about the found item..."></textarea>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="foundImage" class="form-label"><i class="bi bi-image"></i> Upload Image</label>
                            <input type="file" class="form-control" id="foundImage" name="image" accept="image/*">
                            <small class="text-muted">Upload a photo of the item</small>
                        </div>
                    </div>
                    
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Submit Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php $conn->close(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
