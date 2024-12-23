<?php
require_once '../includes/SiteName.php';
require_once '../includes/config.php';
require_once '../includes/auth.php';

requireLogin();

if (!isDonatur()) {
    echo "<p class='text-center text-danger'>Unauthorized access.</p>";
    exit;
}

include '../feature/header.php';

// Ambil daftar donasi yang telah dilakukan oleh Donor yang login
$donator_id = $_SESSION['user']['id'];
$stmt = $conn->prepare("SELECT d.amount, d.created_at, dr.title 
                        FROM donations d
                        JOIN donation_requests dr ON d.request_id = dr.id
                        WHERE d.donator_id = :donator_id
                        ORDER BY d.created_at DESC");
$stmt->execute(['donator_id' => $donator_id]);
$donations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2 class="mb-4">Daftar Donasi yang Anda Lakukan</h2>
    <?php if (count($donations) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Donasi</th>
                    <th>Jumlah Donasi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donations as $donation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($donation['title']); ?></td>
                        <td>$<?php echo number_format($donation['amount'], 2); ?></td>
                        <td><?php echo htmlspecialchars($donation['created_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">Anda belum melakukan donasi.</p>
    <?php endif; ?>
</div>

<?php include '../feature/footer.php'; ?>
