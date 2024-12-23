<?php
require_once '../includes/auth.php';
require_once '../includes/config.php';
requireLogin();
require_once '../feature/header.php';

if (isBeneficiary()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $beneficiary_id = $_SESSION['user']['id'];

        $stmt = $conn->prepare("INSERT INTO donation_requests (title, description, amount, beneficiary_id, status, created_at)
                                VALUES (:title, :description, :amount, :beneficiary_id, 'pending', NOW())");
        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'amount' => $amount,
            'beneficiary_id' => $beneficiary_id
        ]);
        echo "<div class='alert alert-success'>Request successfully submitted!</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Unauthorized access.</div>";
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Request Donation</h2>
    <form method="POST" class="form">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter donation title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter donation description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter target amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include '../feature/footer.php'; ?>
