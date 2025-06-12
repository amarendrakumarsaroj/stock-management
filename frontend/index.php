<?php 
session_start();
include 'includes/db.php';

// Handle login directly from index.php
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM users WHERE username = ? AND is_deleted = 0";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $username;
    header("Location: dashboard.php");
    exit();  // Important: stop executing after redirect
  } else {
    $error = "Invalid credentials.";
  }
}

// Only include header.php AFTER any possible redirects
include 'includes/header.php';
?>

<style>
  body {
    background: url('./resources/background1.png') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    margin: 0;
    padding: 0;
  }
  .overlay {
    position: fixed;
    top: 0; 
    left: 0;
    width: 100%; 
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: -1;
  }
  .login-container {
    position: absolute;
    top: 50%; 
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255,255,255,0.95);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 400px;
  }
</style>

<div class="overlay"></div>

<div class="login-container">
  <div class="text-center mb-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-box-seam-fill" viewBox="0 0 16 16" width="50" height="50" fill="#198754">
      <path d="M9.828.122a1 1 0 0 1 .715.09l4.5 2.25a1 1 0 0 1 .54.878v8.5a1 1 0 0 1-.54.878l-4.5 2.25a1 1 0 0 1-.715.09l-4.5-1.5a1 1 0 0 1-.328-.18l-4-3a1 1 0 0 1-.328-.752v-6a1 1 0 0 1 .328-.752l4-3a1 1 0 0 1 .328-.18l4.5-1.5zM2 5.122V10.5l3.5 2.625V7.747L2 5.122zm5.5 2.625v5.378l3.5-2.625V5.122L7.5 7.747zm7-2.625L10 7.747v5.378l3.5-2.625V5.122z"/>
    </svg>
    <h3 class="mt-3 fw-bold" style="color: #198754;">Stock Management</h3>
  </div>

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
