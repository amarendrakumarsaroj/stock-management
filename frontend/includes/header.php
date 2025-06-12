<!-- /includes/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stock Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .navbar-brand svg {
      width: 40px;
      height: 40px;
      margin-right: 8px;
    }
    .navbar {
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .nav-link {
      font-weight: 500;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <!-- SVG logo -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
        <path d="M9.828.122a1 1 0 0 1 .715.09l4.5 2.25a1 1 0 0 1 .54.878v8.5a1 1 0 0 1-.54.878l-4.5 2.25a1 1 0 0 1-.715.09l-4.5-1.5a1 1 0 0 1-.328-.18l-4-3a1 1 0 0 1-.328-.752v-6a1 1 0 0 1 .328-.752l4-3a1 1 0 0 1 .328-.18l4.5-1.5zM2 5.122V10.5l3.5 2.625V7.747L2 5.122zm5.5 2.625v5.378l3.5-2.625V5.122L7.5 7.747zm7-2.625L10 7.747v5.378l3.5-2.625V5.122z"/>
      </svg>
      <span class="fw-bold">StockMgmt</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php"><i class="bi bi-info-circle-fill"></i> About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="signin.php"><i class="bi bi-box-arrow-in-right"></i> Sign In</a></li>
        <li class="nav-item"><a class="nav-link" href="admin.php"><i class="bi bi-shield-lock-fill"></i> Admin Panel</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
