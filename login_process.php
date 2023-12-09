<?php
global $conn;
session_start();
include('db_connect.php');

// Validate and sanitize user input here

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: login_process.php");
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

$conn->close();
?>
