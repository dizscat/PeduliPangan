<?php
require_once '../includes/SiteName.php';
require_once '../includes/config.php';
require_once '../includes/auth.php';

requireLogin();

if (!isBeneficiary()) {
    echo "<p class='text-center text-danger'>Unauthorized access.</p>";
    exit;
}

include '../feature/header.php';

// Ambil daftar request yang dibuat oleh Beneficiary yang login
$beneficiary_id = $_SESSION['user']['id'];
$stmt = $conn->prepare("
    SELECT dr.id, dr.title, dr.amount, dr.status, 
           (SELECT SUM(d.amount) FROM donations d WHERE d.request_id = dr.id) AS total_donations
    FROM donation_requests dr
    WHERE dr.beneficiary_id = :beneficiary_id
    ORDER BY dr.created_at DESC");
$stmt->execute(['beneficiary_id' => $beneficiary_id]);
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2 class="mb-4">Daftar Request Donasi Anda</h2>
    <?php if (count($requests) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Request</th>
                    <th>Target Donasi</th>
                    <th>Total Donasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($request['title']); ?></td>
                        <td>$<?php echo number_format($request['amount'], 2); ?></td>
                        <td>$<?php echo number_format($request['total_donations'] ?? 0, 2); ?></td>
                        <td>
                            <?php if ($request['status'] === 'approved'): ?>
                                <span class="badge bg-success">Approved</span>
                            <?php elseif ($request['status'] === 'pending'): ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Rejected</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">Anda belum membuat request donasi.</p>
    <?php endif; ?>
</div>

<?php include '../feature/footer.php'; ?>
