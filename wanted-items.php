<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanted Items | Trade Buddy</title>
    
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0 60px;
            text-align: center;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        
        .hero-section h1 {
            font-weight: 700;
            font-size: 3rem;
            margin-bottom: 20px;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            max-width: 900px;
            margin: 0 auto 30px;
            line-height: 1.8;
            opacity: 0.95;
        }
        
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-outline-primary {
            border: 2px solid #667eea;
            color: #667eea;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: transparent;
            color: white;
            transform: scale(1.05);
        }
        
        .form-control, .form-select {
            border-radius: 15px;
            border: 2px solid #e0e6ed;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }
        
        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }
        
        .icon-box {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .icon-box i {
            font-size: 2rem;
            color: white;
        }
        
        .section-title {
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .info-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
        }
        
        .info-card p {
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1><i class="bi bi-search-heart"></i> Looking for something?</h1>
        <p>Find what you need from other parents in the DC community.</p>
    </div>
</div>

<!-- Main Content -->
<div class="container my-5">
    
    <!-- Information Card -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">
            <div class="info-card">
                <p class="text-center">
                    If you're searching for a specific item — a textbook, uniform, or sports kit — you can post a request here. 
                    Other parents who have that item can reach out directly to help.<br><br>
                    Fill out the form below with the item name, size or edition (if relevant), and any extra details.<br>
                    <strong>Trade Buddy makes it easy to save money and reduce waste by connecting you with parents who already have what you're looking for.</strong>
                </p>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card text-center p-4">
                <div class="icon-box">
                    <i class="bi bi-plus-circle"></i>
                </div>
                <h5 class="mb-3">Post a Wanted Item</h5>
                <p class="text-muted mb-3">Looking for something specific? Create a request and let others help you find it.</p>
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#wantedItemModal">
                    Post Request
                </button>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card text-center p-4">
                <div class="icon-box">
                    <i class="bi bi-grid-3x3-gap"></i>
                </div>
                <h5 class="mb-3">Browse Available Items</h5>
                <p class="text-muted mb-3">See what items other parents are looking for and help if you can.</p>
                <a href="Product.php" class="btn btn-outline-primary w-100">
                    View All Items
                </a>
            </div>
        </div>
    </div>
    
    <!-- Recent Wanted Items -->
    <div class="row mb-5">
        <div class="col-12 text-center mb-4">
            <h2 class="section-title d-inline-block">Recent Wanted Items</h2>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box" style="width: 50px; height: 50px; margin: 0; margin-right: 15px;">
                            <i class="bi bi-book" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Math Textbook</h5>
                            <small class="text-muted">Grade 10 Edition</small>
                        </div>
                    </div>
                    <p class="text-muted mb-2"><i class="bi bi-tag"></i> Textbook</p>
                    <p class="mb-3">Looking for Grade 10 Mathematics textbook, preferably in good condition.</p>
                    <span class="badge bg-primary">Posted 2 days ago</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box" style="width: 50px; height: 50px; margin: 0; margin-right: 15px;">
                            <i class="bi bi-person-badge" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">School Uniform</h5>
                            <small class="text-muted">Size M</small>
                        </div>
                    </div>
                    <p class="text-muted mb-2"><i class="bi bi-tag"></i> Uniform</p>
                    <p class="mb-3">Need medium size school uniform for my child. Blazer and trousers preferred.</p>
                    <span class="badge bg-primary">Posted 1 week ago</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-box" style="width: 50px; height: 50px; margin: 0; margin-right: 15px;">
                            <i class="bi bi-dribbble" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Basketball</h5>
                            <small class="text-muted">Official Size</small>
                        </div>
                    </div>
                    <p class="text-muted mb-2"><i class="bi bi-tag"></i> Sports Kit</p>
                    <p class="mb-3">Looking for an official size basketball for school sports practice.</p>
                    <span class="badge bg-primary">Posted 3 days ago</span>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Wanted Item Modal -->
<div class="modal fade" id="wantedItemModal" tabindex="-1" aria-labelledby="wantedItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title" id="wantedItemModalLabel"><i class="bi bi-plus-circle"></i> Post a Wanted Item</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="submit_wanted_item.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="itemName" class="form-label"><i class="bi bi-box"></i> Item Name *</label>
                            <input type="text" class="form-control" id="itemName" name="item_name" required placeholder="e.g., Math Textbook">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label"><i class="bi bi-tag"></i> Category *</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Textbook">Textbook</option>
                                <option value="Uniform">Uniform</option>
                                <option value="Sports Kit">Sports Kit</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="sizeEdition" class="form-label"><i class="bi bi-rulers"></i> Size / Edition</label>
                            <input type="text" class="form-control" id="sizeEdition" name="size_edition" placeholder="e.g., Grade 10, Size M">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="contactInfo" class="form-label"><i class="bi bi-envelope"></i> Contact Info *</label>
                            <input type="text" class="form-control" id="contactInfo" name="contact_info" required placeholder="Email or Phone">
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label"><i class="bi bi-file-text"></i> Description *</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Provide details about what you're looking for..."></textarea>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="imageUpload" class="form-label"><i class="bi bi-image"></i> Upload Image (Optional)</label>
                            <input type="file" class="form-control" id="imageUpload" name="image" accept="image/*">
                            <small class="text-muted">Upload a reference image if available</small>
                        </div>
                    </div>
                    
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
