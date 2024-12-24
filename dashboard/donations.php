<?php
require_once '../includes/SiteName.php';
require_once '../includes/auth.php';
require_once '../includes/config.php';
requireLogin();
requireAdmin();
include '../feature/header.php';

// Ambil data donasi dari database
$stmt = $conn->prepare("SELECT d.*, u.name AS donator_name, r.title AS request_title 
                        FROM donations d
                        JOIN users u ON d.donator_id = u.id
                        JOIN donation_requests r ON d.request_id = r.id");
$stmt->execute();
$donations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h1 class="mb-4">List Donations</h1>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Donator</th>
                <th>Request</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donations as $donation): ?>
                <tr>
                    <td><?php echo htmlspecialchars($donation['donator_name']); ?></td>
                    <td><?php echo htmlspecialchars($donation['request_title']); ?></td>
                    <td>Rp<?php echo number_format($donation['amount'], 2); ?></td>
                    <td><?php echo date("F j, Y, g:i a", strtotime($donation['created_at'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../feature/footer.php'; ?>
