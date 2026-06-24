<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'member') {
    header("Location: login.php");
    exit();
}

include('../../config/db.php');

$userId = $_SESSION['user_id'];

// Fetch user bookings
$queryBookings = "SELECT b.id, v.name AS venue_name, p.name AS package_name, b.date, b.total, b.status
                  FROM bookings b
                  JOIN venues v ON b.venue_id = v.id
                  JOIN packages p ON b.package_id = p.id
                  WHERE b.user_id = $userId
                  ORDER BY b.date DESC";
$resultBookings = mysqli_query($conn, $queryBookings);

// Fetch available venues
$resultVenues = mysqli_query($conn, "SELECT * FROM venues ORDER BY id ");

// Fetch available packages
$resultPackages = mysqli_query($conn, "SELECT * FROM packages ORDER BY id   ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Dashboard - Evently</title>
    <link rel="stylesheet" href="../../assets/css/member.css">
</head>
<body>

<!-- Sidebar -->
<?php include('../../includes/sidebar_member.php'); ?>
<!-- Main Content -->
<div style="margin-left:240px; padding:20px;">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?>!</h2>

    <!-- My Bookings -->
    <h3>My Bookings</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Venue</th>
            <th>Package</th>
            <th>Date</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
        <?php while ($booking = mysqli_fetch_assoc($resultBookings)): ?>
        <tr>
            <td><?= $booking['id']; ?></td>
            <td><?= htmlspecialchars($booking['venue_name']); ?></td>
            <td><?= htmlspecialchars($booking['package_name']); ?></td>
            <td><?= $booking['date']; ?></td>
            <td>₹<?= number_format($booking['total']); ?></td>
            <td><span class="badge"><?= ucfirst($booking['status']); ?></span></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- Available Venues -->
    <h3>Available Venues</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Rate</th>
            <th>Amenities</th>
        </tr>
        <?php while ($venue = mysqli_fetch_assoc($resultVenues)): ?>
        <tr>
            <td><?= $venue['id']; ?></td>
            <td><?= htmlspecialchars($venue['name']); ?></td>
            <td><?= $venue['capacity']; ?></td>
            <td>₹<?= number_format($venue['rate']); ?></td>
            <td><?= htmlspecialchars($venue['amenities']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- Available Packages -->
    <h3>Available Packages</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
        </tr>
        <?php while ($package = mysqli_fetch_assoc($resultPackages)): ?>
        <tr>
            <td><?= $package['id']; ?></td>
            <td><?= htmlspecialchars($package['name']); ?></td>
            <td>₹<?= number_format($package['price']); ?></td>
            <td><?= htmlspecialchars($package['details']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
