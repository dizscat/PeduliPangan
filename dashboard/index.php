<?php
require_once '../includes/auth.php';
requireLogin()
;
requireAdmin();
include '../feature/header.php';
?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>
    <div class="row justify-content-center">
        <!-- Card 1: Manage Users -->
        <div class="col-md-4 mb-3">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View and manage all registered users.</p>
                    <a href="users.php" class="btn btn-primary">Go to Users</a>
                </div>
            </div>
        </div>
        <!-- Card 2: Manage Requests -->
        <div class="col-md-4 mb-3">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Requests</h5>
                    <p class="card-text">Approve or reject donation requests.</p>
                    <a href="requests.php" class="btn btn-primary">Go to Requests</a>
                </div>
            </div>
        </div>
        <!-- Card 3: List Donations -->
        <div class="col-md-4 mb-3">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">List Donations</h5>
                    <p class="card-text">View the list of all donations made.</p>
                    <a href="donations.php" class="btn btn-primary">Go to Donations</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../feature/footer.php'; ?>
