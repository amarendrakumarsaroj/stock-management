<?php
include 'includes/db.php';
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: signin.php");
  exit();
}

$page = 'goldsilverrate'; // this is important for sidebar active link

// Delete operation (soft delete can be used if needed)
if (isset($_GET['delete'])) {
  $delete_id = intval($_GET['delete']);
  $conn->query("DELETE FROM goldsilverrate WHERE id = $delete_id");
  header("Location: goldsilverrate.php");
  exit();
}

// Add operation
if (isset($_POST['add'])) {
  $date = $conn->real_escape_string($_POST['date']);
  $gold_rate_tola = floatval($_POST['gold_rate_tola']);
  $silver_rate_tola = floatval($_POST['silver_rate_tola']);

  $conn->query("INSERT INTO goldsilverrate (date, gold_rate_tola, silver_rate_tola) 
                VALUES ('$date', $gold_rate_tola, $silver_rate_tola)");
  header("Location: goldsilverrate.php");
  exit();
}

// Update operation
if (isset($_POST['update'])) {
  $id = intval($_POST['id']);
  $date = $conn->real_escape_string($_POST['date']);
  $gold_rate_tola = floatval($_POST['gold_rate_tola']);
  $silver_rate_tola = floatval($_POST['silver_rate_tola']);

  $conn->query("UPDATE goldsilverrate 
                SET date='$date', gold_rate_tola=$gold_rate_tola, silver_rate_tola=$silver_rate_tola 
                WHERE id=$id");
  header("Location: goldsilverrate.php");
  exit();
}

// Fetch all records
$result = $conn->query("SELECT * FROM goldsilverrate ORDER BY date DESC");

// Load main content file
$content = 'includes/goldsilverrate_management.php';
include 'includes/layout.php';
?>
