<?php
require_once 'includes/config.php';      // Koneksi ke database
require_once 'includes/auth.php';    // Fungsi autentikasi
require_once 'includes/helpers.php'; // Fungsi tambahan, termasuk redirect()

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        redirect('feature/homepage.php'); // Menggunakan fungsi redirect
    } else {
        $error = 'Email atau password salah';
        redirect('login.php');
    }
}
?>
