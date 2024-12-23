<?php
require_once '../includes/auth.php';
require_once '../includes/config.php';
requireLogin();
requireAdmin();
include '../feature/header.php';

// Ambil data request donasi dari database
$stmt = $conn->prepare("SELECT dr.*, u.name AS beneficiary_name FROM donation_requests dr 
                        JOIN users u ON dr.beneficiary_id = u.id");
$stmt->execute();
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h1 class="mb-4">Manage Donation Requests</h1>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Beneficiary</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?php echo htmlspecialchars($request['title']); ?></td>
                    <td><?php echo htmlspecialchars($request['beneficiary_name']); ?></td>
                    <td>$<?php echo number_format($request['amount'], 2); ?></td>
                    <td>
                        <?php if ($request['status'] === 'pending'): ?>
                            <span class="badge bg-warning text-dark">Pending</span>
                        <?php elseif ($request['status'] === 'approved'): ?>
                            <span class="badge bg-success">Approved</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Rejected</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($request['status'] === 'pending'): ?>
                            <a href="approve_request.php?id=<?php echo $request['id']; ?>" class="btn btn-sm btn-success">Approve</a>
                            <a href="reject_request.php?id=<?php echo $request['id']; ?>" class="btn btn-sm btn-danger">Reject</a>
                        <?php else: ?>
                            <button class="btn btn-sm btn-secondary" disabled>No Actions</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../feature/footer.php'; ?>
