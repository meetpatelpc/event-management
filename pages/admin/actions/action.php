<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

include('../../config/db.php');

// Default message
$_SESSION['message'] = "";

// Handle request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table  = mysqli_real_escape_string($conn, $_POST['table']); // e.g. venues, packages, users
    $action = $_POST['action']; // edit or delete
    $id     = (int) $_POST['id'];

    if ($action === 'delete') {
        $query = "DELETE FROM $table WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $_SESSION['message'] = $result ? ucfirst($table)." record deleted successfully!" 
                                       : "Error deleting record.";
    }

    if ($action === 'edit') {
        // Generic update: loop through all fields except table, action, id
        $updates = [];
        foreach ($_POST as $field => $value) {
            if (!in_array($field, ['table','action','id'])) {
                $updates[] = "$field='".mysqli_real_escape_string($conn, $value)."'";
            }
        }
        if (!empty($updates)) {
            $query = "UPDATE $table SET ".implode(", ", $updates)." WHERE id=$id";
            $result = mysqli_query($conn, $query);
            $_SESSION['message'] = $result ? ucfirst($table)." record updated successfully!" 
                                           : "Error updating record.";
        }
    }

    // Redirect back to the page that sent the request
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
