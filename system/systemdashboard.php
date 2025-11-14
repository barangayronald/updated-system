<?php
session_start();

// Only allow admins
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="dashboard.css"> <!-- new CSS -->
    <link rel="icon" href="../img/Logos.jpg">
</head>

<body>
    <div class="dashboard-container">
        <div class="dashboard-box text-center">
            <h1 class="brand-title">PRINCESS TOUCH</h1>
            <h2 class="admin-title mb-3">Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?> 💖</h2>
            <p class="dashboard-subtitle">Manage your business with ease — all from one place.</p>

            <div class="dashboard-links mt-5">
                <a href="admin-appointment.php" class="dash-btn">
                    <span class="dash-icon">📅</span>
                    Appointments
                </a>
                <a href="admin-sales.php" class="dash-btn">
                    <span class="dash-icon">💰</span>
                    Sales
                </a>
                <a href="admin-stock.php" class="dash-btn">
                    <span class="dash-icon">📦</span>
                    Stock
                </a>
            </div>
        </div>
    </div>
</body>

</html>