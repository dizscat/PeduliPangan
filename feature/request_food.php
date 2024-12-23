<?php
require_once '../includes/auth.php';
require_once '../includes/config.php';
requireLogin();
require_once '../feature/header.php';

if (isDonatur()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $amount = $_POST['amount'];
        $donator_id = $_SESSION['user']['id'];

        $stmt = $conn->prepare("INSERT INTO donation_requests (title, description, address, type, beneficiary_id, amount, status, created_at)
                                VALUES (:title, :description, :address, 'food', :donator_id, :amount, 'pending', NOW())");
        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'address' => $address,
            'amount' => $amount,
            'donator_id' => $donator_id,
        ]);
        echo "<div class='alert alert-success'>Food donation request successfully submitted!</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Unauthorized access.</div>";
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Request Food Donation</h2>
    <form method="POST" class="form">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter request title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter request description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control" rows="2" placeholder="Enter address" required></textarea>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter target amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include '../feature/footer.php'; ?>
