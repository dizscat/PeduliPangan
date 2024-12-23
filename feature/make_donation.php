<?php
require_once '../includes/auth.php';
require_once '../includes/config.php';
requireLogin();
require_once '../feature/header.php';

// Validasi ID request dari URL
$request_id = $_GET['request_id'] ?? null;
if (!$request_id) {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
    include '../feature/footer.php';
    exit();
}

// Ambil data request dari database
$stmt = $conn->prepare("SELECT * FROM donation_requests WHERE id = :id AND status = 'approved'");
$stmt->execute(['id' => $request_id]);
$request = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$request) {
    echo "<div class='alert alert-danger'>Request not found or not approved.</div>";
    include '../feature/footer.php';
    exit();
}

// Proses donasi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $donator_id = $_SESSION['user']['id'];

    $stmt = $conn->prepare("INSERT INTO donations (donator_id, request_id, amount, created_at)
                            VALUES (:donator_id, :request_id, :amount, NOW())");
    $stmt->execute([
        'donator_id' => $donator_id,
        'request_id' => $request_id,
        'amount' => $amount
    ]);

    echo "<div class='alert alert-success'>Donation successfully made!</div>";
    include '../feature/footer.php';
    exit();
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Make a Donation</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($request['title']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($request['description']); ?></p>
            <p class="fw-bold">Target Amount: $<?php echo number_format($request['amount'], 2); ?></p>
        </div>
    </div>
    <form method="POST" class="form">
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Donate</button>
    </form>
</div>

<?php include '../feature/footer.php'; ?>
