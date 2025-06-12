<?php
include 'includes/header.php';
// You might want to add session and authentication check here
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard - Stock Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      width: 280px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #212529; /* Bootstrap dark */
      padding-top: 20px;
      color: white;
      overflow-y: auto;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }
    .sidebar a {
      padding: 12px 24px;
      text-decoration: none;
      font-size: 1.1rem;
      color: #adb5bd;
      display: flex;
      align-items: center;
      transition: background-color 0.3s, color 0.3s;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #198754; /* Bootstrap green */
      color: white;
    }
    .sidebar a i {
      margin-right: 12px;
      font-size: 1.3rem;
    }
    .sidebar .submenu a {
      padding-left: 50px;
      font-size: 1rem;
      color: #ced4da;
    }
    .sidebar .submenu a:hover {
      background-color: #218838;
      color: white;
    }
    .sidebar .menu-heading {
      padding: 0 24px 8px 24px;
      font-weight: 600;
      font-size: 0.9rem;
      color: #6c757d;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 20px;
    }
    .content {
      margin-left: 280px;
      padding: 30px;
    }
    /* Responsive: collapse sidebar to top menu on small screens */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .content {
        margin-left: 0;
        padding: 15px;
      }
      .sidebar a {
        justify-content: center;
      }
      .sidebar a i {
        margin-right: 0;
      }
      .sidebar .submenu a {
        padding-left: 24px;
      }
      .sidebar .menu-heading {
        padding-left: 0;
        text-align: center;
      }
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="menu-heading">Inventory Management</div>
  
  <a href="#oldItemsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
    <i class="bi bi-archive-fill"></i> Old Items Data Entry
  </a>
  <div class="collapse submenu" id="oldItemsSubmenu">
    <a href="old_items_list.php"><i class="bi bi-list-ul"></i> View Old Items</a>
    <a href="old_items_add.php"><i class="bi bi-plus-circle"></i> Add Old Item</a>
  </div>

  <a href="new_items_entry.php"><i class="bi bi-box-seam"></i> New Items Data Entry</a>
  <a href="new_sale_entry.php"><i class="bi bi-cart-check"></i> New Sale Entry</a>
  <a href="new_purchase_entry.php"><i class="bi bi-bag-plus"></i> New Purchase Entry</a>
</div>

<div class="content">
  <h1>Welcome to your Dashboard</h1>
  <p>This is the content area where you will manage your inventory and sales data.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
