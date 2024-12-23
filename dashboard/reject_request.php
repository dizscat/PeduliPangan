<?php
require_once '../includes/auth.php';
require_once '../includes/config.php';
requireLogin();
requireAdmin();

if (isset($_GET['id'])) {
    $requestId = intval($_GET['id']); // Ambil ID request dari URL dan validasi
    $stmt = $conn->prepare("UPDATE donation_requests SET status = 'rejected' WHERE id = :id");
    $stmt->execute(['id' => $requestId]);

    // Redirect kembali ke halaman Manage Requests
    header('Location: ../dashboard/requests.php');
    exit();
} else {
    // Jika tidak ada ID, redirect kembali ke Manage Requests
    header('Location: ../dashboard/requests.php');
    exit();
}
?>
