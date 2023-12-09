<?php
$servername = "172.31.22.43";
$username = "Ajay200552716";
$password = "YwtHqo_nfe";
$dbname = "Ajay200552716";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
