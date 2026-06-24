<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'member') {
    header("Location: login.php");
    exit();
}

include('../../config/db.php');

$userId = $_SESSION['user_id'];
$message = "";

// Handle booking form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $venueId   = (int) $_POST['venue_id'];
    $packageId = (int) $_POST['package_id'];
    $date      = mysqli_real_escape_string($conn, $_POST['date']);
    $seating   = mysqli_real_escape_string($conn, $_POST['seating_style']);
    $food      = mysqli_real_escape_string($conn, $_POST['food_menu']);

    // Get package price
    $pkg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT price FROM packages WHERE id=$packageId"));
    $total = $pkg ? $pkg['price'] : 0;

    $query = "INSERT INTO bookings (user_id, venue_id, package_id, date, total, status, seating_style, food_menu) 
              VALUES ($userId, $venueId, $packageId, '$date', $total, 'pending', '$seating', '$food')";
    if (mysqli_query($conn, $query)) {
        $message = "Booking created successfully with seating and food options!";
    } else {
        $message = "Error: Could not create booking.";
    }
}

// Fetch venues and packages
$resultVenues   = mysqli_query($conn, "SELECT id, name FROM venues ORDER BY name ASC");
$resultPackages = mysqli_query($conn, "SELECT id, name, price FROM packages ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Booking - Evently</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<?php include('../../includes/sidebar_member.php'); ?>

<div style="margin-left:240px; padding:20px;">
    <h2>Create a Booking</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Venue</label>
        <select name="venue_id" required>
            <option value="">-- Select Venue --</option>
            <?php while ($venue = mysqli_fetch_assoc($resultVenues)): ?>
                <option value="<?= $venue['id']; ?>"><?= htmlspecialchars($venue['name']); ?></option>
            <?php endwhile; ?>
        </select>

        <label>Package</label>
        <select name="package_id" required>
            <option value="">-- Select Package --</option>
            <?php while ($package = mysqli_fetch_assoc($resultPackages)): ?>
                <option value="<?= $package['id']; ?>">
                    <?= htmlspecialchars($package['name']); ?> (₹<?= number_format($package['price']); ?>)
                </option>
            <?php endwhile; ?>
        </select>

        <label>Date</label>
        <input type="date" name="date" required>

        <label>Seating Style</label>
        <select name="seating_style" required>
            <option value="banquet">Banquet</option>
            <option value="theater">Theater</option>
            <option value="round_tables">Round Tables</option>
            <option value="classroom">Classroom</option>
            <option value="u_shape">U-Shape</option>
            <option value="conference_room">Conference Room</option>    
        </select>

        <label>Food Menu</label>
        <select name="food_menu" required>
            <option value="buffet">Buffet</option>
            <option value="veg_buffet">Vegetarian Buffet</option>
            <option value="non_veg_buffet">Non-Vegetarian Buffet</option>
            <option value="mixed">Mixed(Veg/Non-Veg)</option>
            <option value="snacks">Snacks Only</option>
        </select>

        <button type="submit" class="btn">Book Now</button>
    </form>
</div>

</body>
</html>
