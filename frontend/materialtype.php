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
  $conn->query("UPDATE materialtype SET is_deleted = 1 WHERE id = $delete_id");
  header("Location: materialtype.php");
  exit();
}

// Add material type
if (isset($_POST['add'])) {
  $materialtype = $conn->real_escape_string($_POST['materialtype']);
  $conn->query("INSERT INTO materialtype (materialtype) VALUES ('$materialtype')");
  header("Location: materialtype.php");
  exit();
}

// Update material type
if (isset($_POST['update'])) {
  $id = intval($_POST['id']);
  $materialtype = $conn->real_escape_string($_POST['materialtype']);
  $conn->query("UPDATE materialtype SET materialtype='$materialtype' WHERE id=$id");
  header("Location: materialtype.php");
  exit();
}

$result = $conn->query("SELECT id, materialtype, is_deleted FROM materialtype");

$content = 'includes/material_management.php';
include 'includes/layout.php';
?>
