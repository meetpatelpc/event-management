<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('../../config/db.php');

$userId = $_SESSION['user_id'];
$message = "";

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);


    // Check if profile exists
    $check = mysqli_query($conn, "SELECT * FROM profiles WHERE user_id=$userId");
    if (mysqli_num_rows($check) > 0) {
        $query = "UPDATE profiles 
                  SET phone='$phone', address='$address' 
                  WHERE user_id=$userId";
    } else {
        $query = "INSERT INTO profiles (user_id, phone, address) 
                  VALUES ($userId, '$phone', '$address')";
    }

    if (mysqli_query($conn, $query)) {
        $message = "Profile updated successfully!";
    } else {
        $message = "Error: Could not update profile.";
    }
}

// Fetch user info
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$userId"));
$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM profiles WHERE user_id=$userId"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - Evently</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<!-- Sidebar -->
<?php include('../../includes/sidebar_member.php'); ?>

<!-- Main Content -->
<div style="margin-left:240px; padding:20px;">
    <h2>My Profile</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>Name</label>
        <input type="text" value="<?= htmlspecialchars($user['name']); ?>" disabled>

        <label>Email</label>
        <input type="email" value="<?= htmlspecialchars($user['email']); ?>" disabled>

        <label>Phone</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($profile['phone'] ?? ''); ?>">

        <label>Address</label>
        <input type="text" name="address" value="<?= htmlspecialchars($profile['address'] ?? ''); ?>">
        <button type="submit" class="btn">Save Profile</button>
    </form>
</div>

</body>
</html>
