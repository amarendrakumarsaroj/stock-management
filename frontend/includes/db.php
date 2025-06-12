<?php
$servername = "mysql";
$username = "stockuser";
$password = "stockpassword";
$dbname = "stockdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
