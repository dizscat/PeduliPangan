<?php include '../feature/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Register</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="register_handler.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="donatur">Donatur</option>
                                <option value="beneficiary">Beneficiary</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Sudah punya akun? <a href="login.php" class="text-primary">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../feature/footer.php'; ?>
