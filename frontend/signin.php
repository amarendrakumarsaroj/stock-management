<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $sql = "SELECT * FROM users WHERE username = ? AND is_deleted = 0";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $username;
    header("Location: dashboard.php");
    exit();
  } else {
    $error = "Invalid credentials";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign In - Stock Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: url('/resources/background1.png') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
    }
    .overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: -1;
    }
    .login-container {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255,255,255,0.9);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 400px;
    }
    .logo {
      text-align: center;
      margin-bottom: 30px;
    }
    .logo svg {
      width: 60px;
      height: 60px;
      fill: #198754;
    }
    .logo h1 {
      font-weight: bold;
      color: #198754;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="overlay"></div>

<div class="login-container">
  <div class="logo">
    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
      <path d="M9.828.122a1 1 0 0 1 .715.09l4.5 2.25a1 1 0 0 1 .54.878v8.5a1 1 0 0 1-.54.878l-4.5 2.25a1 1 0 0 1-.715.09l-4.5-1.5a1 1 0 0 1-.328-.18l-4-3a1 1 0 0 1-.328-.752v-6a1 1 0 0 1 .328-.752l4-3a1 1 0 0 1 .328-.18l4.5-1.5zM2 5.122V10.5l3.5 2.625V7.747L2 5.122zm5.5 2.625v5.378l3.5-2.625V5.122L7.5 7.747zm7-2.625L10 7.747v5.378l3.5-2.625V5.122z"/>
    </svg>
    <h1>StockMgmt</h1>
  </div>

  <h3 class="text-center mb-4">Sign In</h3>

  <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

  <form method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required autofocus>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-box-arrow-in-right"></i> Login</button>
    </div>
  </form>
</div>

</body>
</html>
