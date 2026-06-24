<?php
session_start();
include('../config/db.php');

$error = "";
$success = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = mysqli_real_escape_string($conn, $_POST['role']);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already registered!";
    } else {
        $query = "INSERT INTO users (name, email, password, role) 
                  VALUES ('$name', '$email', '$password', '$role')";
        if (mysqli_query($conn, $query)) {
            alert("Registration successful! You can now log in.");
            header("Location: login.php");
        } else {
            $error = "Error: Could not register user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Evently</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header>
    <h1>Evently</h1>
</header>

<div class="container">
    <form method="POST" action="">
        <h2>Create Account</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-error">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>



        <label>Full Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label>
        <select name="role" required>
            <option value="member">Member</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit" class="btn">Register</button>
        <p style="text-align:center; margin-top:10px;">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </form>
</div>

<footer>
    <p>&copy; <?= date("Y"); ?> Evently. All rights reserved.</p>
</footer>

</body>
</html>
