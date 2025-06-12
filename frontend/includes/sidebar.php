<nav class="col-md-2 d-md-block bg-light sidebar py-5">
  <div class="position-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'goldsilverrate') echo 'active'; ?>" href="goldsilverrate.php">
          Gold & Silver Rate Management
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page == 'users') echo 'active'; ?>" href="admin.php">
          User Management
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page == 'material') echo 'active'; ?>" href="materialtype.php">
          Material Type Management
        </a>
      </li>
    </ul>
  </div>
</nav>
