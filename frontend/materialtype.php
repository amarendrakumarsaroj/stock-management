<?php
include 'includes/db.php';
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: signin.php");
  exit();
}

$page = 'material'; // for sidebar highlighting

// Soft delete material type
if (isset($_GET['delete'])) {
  $delete_id = intval($_GET['delete']);
  $conn->query("UPDATE material_types SET is_deleted = 1 WHERE id = $delete_id");
  header("Location: materialtype.php");
  exit();
}

// Add material type
if (isset($_POST['add'])) {
  $name = $conn->real_escape_string($_POST['name']);
  $conn->query("INSERT INTO material_types (name) VALUES ('$name')");
  header("Location: materialtype.php");
  exit();
}

// Update material type
if (isset($_POST['update'])) {
  $id = intval($_POST['id']);
  $name = $conn->real_escape_string($_POST['name']);
  $conn->query("UPDATE material_types SET name='$name' WHERE id=$id");
  header("Location: materialtype.php");
  exit();
}

$result = $conn->query("SELECT id, name, is_deleted FROM material_types");

// Set content file to load inside layout
$content = 'includes/material_management.php';
include 'includes/layout.php';
?>
