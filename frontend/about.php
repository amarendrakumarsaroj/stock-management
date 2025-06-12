<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About Us - Stock Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    body {
      background: url('./resources/background1.png') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      margin: 0;
      color: white;
    }
    .overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
      z-index: -1;
    }
    .about-section {
      padding: 100px 20px;
    }
    .about-header {
      text-align: center;
      margin-bottom: 60px;
    }
    .about-header h1 {
      font-weight: bold;
    }
    .card-custom {
      background-color: rgba(255, 255, 255, 0.85);
      color: #333;
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .card-custom:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.4);
    }
    .card-custom img {
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      object-fit: cover;
      height: 250px;
    }
  </style>
</head>

<body>
  <div class="overlay"></div>

  <div class="container about-section">
    <div class="about-header">
      <h1 class="display-4">OUR DESIGNS</h1>
      <p class="lead">Modern Designs</p>
    </div>

    <div class="row g-5">

      <div class="col-md-6 col-lg-3">
        <div class="card card-custom h-100">
          <img src="./resources/ab1.png" class="card-img-top" alt="Image 1">
          <div class="card-body">
            <h5 class="card-title">Fresh Apples</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut aliquet diam.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card card-custom h-100">
          <img src="./resources/ab2.png" class="card-img-top" alt="Image 2">
          <div class="card-body">
            <h5 class="card-title">Juicy Oranges</h5>
            <p class="card-text">Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card card-custom h-100">
          <img src="./resources/ab3.png" class="card-img-top" alt="Image 3">
          <div class="card-body">
            <h5 class="card-title">Ripe Bananas</h5>
            <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card card-custom h-100">
          <img src="./resources/ab4.png" class="card-img-top" alt="Image 4">
          <div class="card-body">
            <h5 class="card-title">Sweet Grapes</h5>
            <p class="card-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
