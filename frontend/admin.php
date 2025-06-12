<?php
include 'includes/db.php';
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: signin.php");
  exit();
}

$page = 'users'; // active menu highlight

// Soft delete user
if (isset($_GET['delete'])) {
  $delete_id = intval($_GET['delete']);
  $conn->query("UPDATE users SET is_deleted = 1 WHERE id = $delete_id");
  header("Location: admin.php");
  exit();
}

// Update user
if (isset($_POST['update'])) {
  $id = intval($_POST['id']);
  $username = $conn->real_escape_string($_POST['username']);
  $conn->query("UPDATE users SET username='$username' WHERE id=$id");
  header("Location: admin.php");
  exit();
}

$result = $conn->query("SELECT id, username, is_deleted FROM users");

// Set content file to load inside layout
$content = 'includes/user_management.php';
include 'includes/layout.php';
?>
