<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include('../../config/db.php');

// Handle role update
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $userId = (int) $_POST['user_id'];
    $role   = mysqli_real_escape_string($conn, $_POST['role']);

    $query = "UPDATE users SET role='$role' WHERE id=$userId";
    if (mysqli_query($conn, $query)) {
        $message = "User role updated successfully!";
    } else {
        $message = "Error: Could not update user role.";
    }
}

// Fetch all users
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users - Evently Admin</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<!-- Sidebar -->
<?php include('../../includes/sidebar_admin.php'); ?>


<!-- Main Content -->
<div style="margin-left:240px; padding:20px;">
    <h2>Manage Users</h2>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php while ($user = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= htmlspecialchars($user['name']); ?></td>
            <td><?= htmlspecialchars($user['email']); ?></td>
            <td><?= ucfirst($user['role']); ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                    <select name="role">
                        <option value="member" <?= $user['role']=='member'?'selected':''; ?>>Member</option>
                        <option value="admin"  <?= $user['role']=='admin'?'selected':''; ?>>Admin</option>
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
