<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include('../../config/db.php');

// Example metrics (replace with DB queries)
$totalVenues   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM venues"));
$totalBookings = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookings"));
$totalUsers    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
$totalRevenue  = 0;

// Calculate revenue (sum of booking totals)
$result = mysqli_query($conn, "SELECT SUM(total) AS revenue FROM bookings");
if ($row = mysqli_fetch_assoc($result)) {
    $totalRevenue = $row['revenue'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Evently</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>

<!-- Sidebar -->
<?php include('../../includes/sidebar_admin.php'); ?>

<!-- Main Content -->
<div class="stats">
    <div class="card">
        <h3>Total Venues</h3>
        <p><?= $totalVenues; ?></p>
    </div>
    <div class="card">
        <h3>Total Bookings</h3>
        <p><?= $totalBookings; ?></p>
    </div>
    <div class="card">
        <h3>Total Revenue</h3>
        <p>₹<?= number_format($totalRevenue); ?></p>
    </div>
    <div class="card">
        <h3>Total Users</h3>
        <p><?= $totalUsers; ?></p>
    </div>
</div>

<!-- Admin Actions -->
<div class="stats">
    <div class="card">
        <h3>Add Venue</h3>
        <p><a href="venues.php" class="btn">Create New Venue</a></p>
    </div>
    <div class="card">
        <h3>Manage Users</h3>
        <p><a href="users.php" class="btn">View & Edit Users</a></p>
    </div>
</div>

</body>
</html>
