<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akun Pengguna</title>
    <link rel="stylesheet" href="css/account.css">
</head>
<body>
    <header>
        <div class="logo"><a href="index.php" style="text-decoration: none; color: black;">PEPAN</a></div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Beranda</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light me-2" href="../feature/login.php">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="../feature/register.php">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="account-content">
        <h1>Akun</h1>
        <div class="login-prompt">

            <ul class="account-options">
                <li><a href="#">Bantuan</a></li>
                <li><a href="#">Tentang Kitabisa</a></li>
                <li><a href="#">Syarat & Ketentuan</a></li>
                <li><a href="#">Akuntabilitas & Transparansi</a></li>
            </ul>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>