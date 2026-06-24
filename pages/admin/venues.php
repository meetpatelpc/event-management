<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include('../../config/db.php');

// Handle Add Venue form submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name      = mysqli_real_escape_string($conn, $_POST['name']);
    $capacity  = (int) $_POST['capacity'];
    $rate      = (float) $_POST['rate'];
    $amenities = mysqli_real_escape_string($conn, $_POST['amenities']);

    $query = "INSERT INTO venues (name, capacity, rate, amenities) 
              VALUES ('$name', '$capacity', '$rate', '$amenities')";
    if (mysqli_query($conn, $query)) {
        $message = "Venue added successfully!";
    } else {
        $message = "Error: Could not add venue.";
    }
}

// Fetch all venues
$result = mysqli_query($conn, "SELECT * FROM venues ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Venues - Evently Admin</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<!-- Sidebar -->
<?php include('../../includes/sidebar_admin.php'); ?>


<!-- Main Content -->
<div style="margin-left:240px; padding:20px;">
    <h2>Manage Venues</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <!-- Add Venue Form -->
    <form method="POST" style="margin-bottom:30px;">
        <h3>Add New Venue</h3>
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Capacity</label>
        <input type="number" name="capacity" required>

        <label>Rate (₹)</label>
        <input type="number" step="0.01" name="rate" required>

        <label>Amenities</label>
        <textarea name="amenities"></textarea>

        <button type="submit" class="btn">Add Venue</button>
    </form>

    <!-- Venues Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Rate</th>
            <th>Amenities</th>
        </tr>
        <?php while ($venue = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $venue['id']; ?></td>
            <td><?= htmlspecialchars($venue['name']); ?></td>
            <td><?= $venue['capacity']; ?></td>
            <td>₹<?= number_format($venue['rate']); ?></td>
            <td><?= htmlspecialchars($venue['amenities']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
