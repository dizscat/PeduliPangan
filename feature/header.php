<?php
require_once __DIR__ . '/../includes/SiteName.php'; // Gunakan path absolut
require_once __DIR__ . '/../includes/auth.php';  // Gunakan path absolut
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome Free Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../feature/homepage.php">
            <i class="fas fa-hand-holding-heart"></i> <?php echo SITE_NAME; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isLoggedIn()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                         <i class="fas fa-home"></i> Home
                        </a>
                    <?php if (isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../dashboard/index.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                    <?php elseif (isDonatur()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../feature/request_food.php">
                                <i class="fas fa-utensils"></i> Buat Donasi Makanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../feature/donor_donations.php">
                                <i class="fas fa-list"></i> Donasi Saya
                            </a>
                        </li>
                    <?php elseif (isBeneficiary()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../feature/request_form.php">
                                <i class="fas fa-hands-helping"></i> Request Donasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../feature/beneficiary_requests.php">
                                <i class="fas fa-tasks"></i> Request Saya
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                <?php else: ?>
 
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="../feature/login.php">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="../register.php">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                <?php endif; ?>
  
            </ul>
        </div>
    </div>
</nav>
