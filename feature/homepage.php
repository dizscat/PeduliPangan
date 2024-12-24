<?php
require_once '../includes/SiteName.php';
require_once '../includes/config.php';
require_once '../includes/auth.php';
include '../feature/header.php';

// Ambil semua request reguler dan makanan yang disetujui
$stmtRegular = $conn->prepare("SELECT * FROM donation_requests WHERE status = 'approved' AND type = 'general'");
$stmtRegular->execute();
$regularRequests = $stmtRegular->fetchAll(PDO::FETCH_ASSOC);

$stmtFood = $conn->prepare("SELECT * FROM donation_requests WHERE status = 'approved' AND type = 'food'");
$stmtFood->execute();
$foodRequests = $stmtFood->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <!-- Section untuk Donasi Reguler -->
    <h2 class="mb-4 text-primary">💸 Berikan Donasimu</h2>
    <div class="row g-4">
        <?php if (count($regularRequests) > 0): ?>
            <?php foreach ($regularRequests as $request): ?>
                <div class="col-md-4">
                    <div class="card border-primary shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0"><?php echo htmlspecialchars($request['title']); ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo htmlspecialchars($request['description']); ?></p>
                            <p class="fw-bold text-primary">Target: Rp.<?php echo number_format($request['amount'], 2); ?></p>
                            <?php if (isLoggedIn() && isDonatur()): ?>
                                <a href="make_donation.php?request_id=<?php echo $request['id']; ?>" class="btn btn-outline-primary w-100">Donasi Sekarang</a>
                            <?php else: ?>
                                <p class="text-muted">Login sebagai donatur untuk melakukan donasi</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada donasi aktif saat ini</p>
        <?php endif; ?>
    </div>

    <!-- Section untuk Donasi Makanan -->
    <h2 class="mt-5 mb-4 text-success">🍲 Daftar Donasi Makanan Tersedia</h2>
    <div class="row g-4">
        <?php if (count($foodRequests) > 0): ?>
            <?php foreach ($foodRequests as $request): ?>
                <div class="col-md-4">
                    <div class="card border-success shadow">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0"><?php echo htmlspecialchars($request['title']); ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo htmlspecialchars($request['description']); ?></p>
                            <p class="text-muted"><i class="fas fa-map-marker-alt"></i> Alamat: <?php echo htmlspecialchars($request['address']); ?></p>
                            <p class="text-success fw-bold">Jumlah: <?php echo number_format($request['amount'], 2); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada donasi makanan aktif saat ini</p>
        <?php endif; ?>
    </div>
</div>

<?php include '../feature/footer.php'; ?>
