<?php
session_start();
include('../config/db.php');

// If already logged in, redirect to dashboard
if (isset($_SESSION['user_id'])) {
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=" . $_SESSION['user_id']));
    if ($user['role'] === 'admin') {
            header("Location: admin/admin_dashboard.php");
        } else {
            header("Location: member/dashboard.php");
        }
    exit();
}

$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] === 'admin') {
            header("Location: admin/admin_dashboard.php");
        } else {
            header("Location: member/dashboard.php");
        }
       
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Evently</title>
    <link rel="stylesheet" href="../assets/css/member.css">
</head>
<body>

<div class="card">
    <h2>Member Login</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
    </form>
    <p>Don’t have an account? <a href="register.php">Register here</a></p>
</div>

</body>
</html>

