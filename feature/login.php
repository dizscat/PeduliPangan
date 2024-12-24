<?php
require_once '../includes/SiteName.php'; // Gunakan path absolut
require_once '../includes/auth.php';  // Gunakan path absolut
?>

<?php include '../feature/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="../login_handler.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Don't have an account? <a href="../feature/register.php" class="text-primary">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../feature/footer.php'; ?>
