<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

include('../../config/db.php');

$message = "";

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    $bookingId = (int) $_POST['booking_id'];
    $status    = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE bookings SET status='$status' WHERE id=$bookingId";
    if (mysqli_query($conn, $query)) {
        $message = "Booking status updated successfully!";
    } else {
        $message = "Error: Could not update booking.";
    }
}

// Handle filters
$venueFilter  = isset($_GET['venue_id']) ? (int) $_GET['venue_id'] : 0;
$statusFilter = isset($_GET['status']) ? mysqli_real_escape_string($conn, $_GET['status']) : '';

$queryBookings = "SELECT b.id, u.name AS user_name, v.name AS venue_name, 
                         p.name AS package_name, b.date, b.total, b.status,
                         b.seating_style, b.food_menu
                  FROM bookings b
                  JOIN users u ON b.user_id = u.id
                  JOIN venues v ON b.venue_id = v.id
                  JOIN packages p ON b.package_id = p.id
                  WHERE 1=1";

if ($venueFilter > 0) {
    $queryBookings .= " AND b.venue_id = $venueFilter";
}
if (!empty($statusFilter)) {
    $queryBookings .= " AND b.status = '$statusFilter'";
}

$queryBookings .= " ORDER BY b.date DESC";
$resultBookings = mysqli_query($conn, $queryBookings);

// Fetch venues for dropdown
$resultVenues = mysqli_query($conn, "SELECT id, name FROM venues ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Bookings - Evently</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<?php include('../../includes/sidebar_admin.php'); ?>

<div style="margin-left:240px; padding:20px;">
    <h2>Manage Bookings</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <!-- Filter Form -->
    <form method="GET" style="margin-bottom:20px;">
        <label>Filter by Venue:</label>
        <select name="venue_id">
            <option value="0">All Venues</option>
            <?php while ($venue = mysqli_fetch_assoc($resultVenues)): ?>
                <option value="<?= $venue['id']; ?>" <?= $venueFilter==$venue['id']?'selected':''; ?>>
                    <?= htmlspecialchars($venue['name']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Filter by Status:</label>
        <select name="status">
            <option value="">All Status</option>
            <option value="pending"   <?= $statusFilter=='pending'?'selected':''; ?>>Pending</option>
            <option value="confirmed" <?= $statusFilter=='confirmed'?'selected':''; ?>>Confirmed</option>
            <option value="cancelled" <?= $statusFilter=='cancelled'?'selected':''; ?>>Cancelled</option>
        </select>

        <button type="submit" class="btn">Apply Filters</button>
    </form>

    <!-- Bookings Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Venue</th>
            <th>Package</th>
            <th>Date</th>
            <th>Total</th>
            <th>Seating Style</th>
            <th>Food Menu</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($booking = mysqli_fetch_assoc($resultBookings)): ?>
        <tr>
            <td><?= $booking['id']; ?></td>
            <td><?= htmlspecialchars($booking['user_name']); ?></td>
            <td><?= htmlspecialchars($booking['venue_name']); ?></td>
            <td><?= htmlspecialchars($booking['package_name']); ?></td>
            <td><?= $booking['date']; ?></td>
            <td>₹<?= number_format($booking['total']); ?></td>
            <td><?= ucfirst($booking['seating_style']); ?></td>
            <td><?= ucfirst($booking['food_menu']); ?></td>
            <td><span class="badge"><?= ucfirst($booking['status']); ?></span></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="booking_id" value="<?= $booking['id']; ?>">
                    <select name="status">
                        <option value="pending"   <?= $booking['status']=='pending'?'selected':''; ?>>Pending</option>
                        <option value="confirmed" <?= $booking['status']=='confirmed'?'selected':''; ?>>Confirmed</option>
                        <option value="cancelled" <?= $booking['status']=='cancelled'?'selected':''; ?>>Cancelled</option>
                    </select>
                    <button type="submit" class="btn">Update</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
