<?php
global $conn;
session_start();

// Include the database connection code
include('db_connect.php');

// Validate and sanitize user input here

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['user_id'] = $conn->insert_id;
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();  // Make sure to exit to prevent further script execution
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
