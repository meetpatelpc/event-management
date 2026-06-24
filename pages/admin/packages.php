<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include('../../config/db.php');

// Handle Add Package form submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $price   = (float) $_POST['price'];
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    $query = "INSERT INTO packages (name, price, details) 
              VALUES ('$name', '$price', '$details')";
    if (mysqli_query($conn, $query)) {
        $message = "Package added successfully!";
    } else {
        $message = "Error: Could not add package.";
    }
}

// Fetch all packages
$result = mysqli_query($conn, "SELECT * FROM packages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Packages - Evently Admin</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<!-- Sidebar -->
<?php include('../../includes/sidebar_admin.php'); ?>


<!-- Main Content -->
<div style="margin-left:240px; padding:20px;">
    <h2>Manage Packages</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <!-- Add Package Form -->
    <form method="POST" style="margin-bottom:30px;">
        <h3>Add New Package</h3>
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Price (₹)</label>
        <input type="number" step="0.01" name="price" required>

        <label>Details</label>
        <textarea name="details"></textarea>

        <button type="submit" class="btn">Add Package</button>
    </form>

    <!-- Packages Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
        </tr>
        <?php while ($package = mysqli_fetch_assoc($result)): ?>
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
