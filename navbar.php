<!-- Bootstrap CSS & Icons -->


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trade Buddy</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Fira+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://unpkg.com/animejs@2.2.0/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</head>




<style>

.navbar-modern {
    background: linear-gradient(90deg, #00b894, #00cec9);
    padding: 15px 0;
}

.navbar-modern .navbar-brand {
    color: #fff !important;
    font-weight: bold;
    font-size: 1.5rem;
}

.navbar-modern .navbar-brand img {
    filter: brightness(100);
}

.navbar-modern .nav-link {
    color: #ffffff !important;
    transition: color 0.3s ease;
    font-weight: 500;
    padding: 0.5rem 1rem;
}

.navbar-modern .nav-link:hover,
.navbar-modern .nav-link.active {
    color: #dfe6e9 !important;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.navbar-modern .dropdown-menu {
    border: none;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}

.navbar-modern .dropdown-item:hover {
    background-color: #00cec9;
    color: white;
}

.navbar-modern .nav-link {
    display: inline-block;
    margin: 0 5px;
    white-space: nowrap;
}

.navbar-modern .navbar-toggler:focus {
    box-shadow: none;
    outline: none;
}

.navbar-modern .navbar-brand img {
    max-height: 80px;
    width: auto;
}

@media (max-width: 768px) {
    .navbar-modern .nav-link {
        display: block;
        margin: 8px 0;
        font-size: 0.95rem;
    }
    
    .navbar-modern .navbar-brand img {
        height: 60px;
        width: 120px;
    }
    
    .navbar-modern .navbar-brand {
        margin-right: 0 !important;
    }
}
</style>



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isUser = isset($_SESSION['customer_id']);
$isAdmin = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
$userName = '';
if ($isUser) {
    $userName = isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : 'User';
}
if ($isAdmin) {
    $userName = 'Admin';
}
?>
<nav class="navbar navbar-expand-lg navbar-modern shadow-sm">
  <div class="container-fluid px-2 px-md-3">
    <a href="index.php" class="navbar-brand d-flex align-items-center me-auto">
      <img src="images/tb.png" height="80" width="160" class="me-2" alt="Trade Buddy Logo">
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
      <i class="bi bi-list text-white" style="font-size: 1.5rem;"></i>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- Navigation Menu -->
      <ul class="nav navbar-nav mx-auto">
        <li class="nav-item"><a href="index.php" class="nav-link<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? ' active' : ''; ?>">Home</a></li>
        <li class="nav-item"><a href="Product.php" class="nav-link<?php echo (basename($_SERVER['PHP_SELF']) == 'Product.php') ? ' active' : ''; ?>">Products</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link<?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? ' active' : ''; ?>">Contact</a></li>
        <?php if ($isUser): ?>
        <li class="nav-item"><a href="wanted-items.php" class="nav-link<?php echo (basename($_SERVER['PHP_SELF']) == 'wanted-items.php') ? ' active' : ''; ?>">Wanted Items</a></li>
        
        
        <!--<li class="nav-item"><a href="lost-found.php" class="nav-link<?php echo (basename($_SERVER['PHP_SELF']) == 'lost-found.php') ? ' active' : ''; ?>">Lost &amp; Found</a></li>-->
        
        
        
        
        <li class="nav-item"><a href="donate.php" class="nav-link<?php echo (basename($_SERVER['PHP_SELF']) == 'donate.php') ? ' active' : ''; ?>">Donate</a></li>
        <?php endif; ?>
      </ul>
      
      <!-- Profile/User/Admin Dropdown or Login/Register -->
      <ul class="nav navbar-nav ms-auto">
        <?php if ($isUser): ?>
          <li class="nav-item">
            <a href="profile.php" class="nav-link" title="Profile">
              <i class="bi bi-person-circle fs-5 text-white"></i> <span class="ms-1"><?php echo htmlspecialchars($userName); ?></span>
            </a>
          </li>
        <?php elseif ($isAdmin): ?>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Admin">
              <i class="bi bi-person-circle fs-5 text-white"></i> <span class="ms-1"><?php echo htmlspecialchars($userName); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="admin_panel.php">Admin Panel</a></li>
              <li><a class="dropdown-item" href="admin_logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item"><a href="login.html" class="nav-link">User Login</a></li>
          <li class="nav-item"><a href="login.html" class="nav-link">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>