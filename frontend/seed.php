<?php
include 'includes/db.php';

$username = 'root';
$password = 'root';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conn->prepare("INSERT INTO users (username, password,is_deleted) VALUES (?, ?, 0)
ON DUPLICATE KEY UPDATE password=VALUES(password), is_deleted=0");
$stmt->bind_param("sss", $username, $hashed_password);
$stmt->execute();

echo "User inserted successfully!";
