<?php
include 'includes/db.php';
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: signin.php");
  exit();
}

// Create
if (isset($_POST['add'])) {
  $materialtype = trim($_POST['materialtype']);
  if (!empty($materialtype)) {
    $stmt = $conn->prepare("INSERT INTO materialtype (materialtype, is_deleted) VALUES (?, 0)");
    $stmt->bind_param("s", $materialtype);
    $stmt->execute();
    $stmt->close();
  }
  header("Location: materialtype.php");
  exit();
}

// Update
if (isset($_POST['update'])) {
  $id = intval($_POST['id']);
  $materialtype = trim($_POST['materialtype']);
  if (!empty($materialtype)) {
    $stmt = $conn->prepare("UPDATE materialtype SET materialtype = ? WHERE id = ?");
    $stmt->bind_param("si", $materialtype, $id);
    $stmt->execute();
    $stmt->close();
  }
  header("Location: materialtype.php");
  exit();
}

// Soft Delete
if (isset($_GET['delete'])) {
  $delete_id = intval($_GET['delete']);
  $conn->query("UPDATE materialtype SET is_deleted = 1 WHERE id = $delete_id");
  header("Location: materialtype.php");
  exit();
}

// Restore
if (isset($_GET['restore'])) {
  $restore_id = intval($_GET['restore']);
  $conn->query("UPDATE materialtype SET is_deleted = 0 WHERE id = $restore_id");
  header("Location: materialtype.php");
  exit();
}

$result = $conn->query("SELECT id, materialtype, is_deleted FROM materialtype");
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
  <h2>Material Types Management</h2>

  <!-- Add Form -->
  <form method="POST" class="mb-4">
    <div class="input-group">
      <input type="text" name="materialtype" class="form-control" placeholder="New Material Type" required>
      <button type="submit" name="add" class="btn btn-primary">Add</button>
    </div>
  </form>

  <!-- Display Table -->
  <table class="table table-bordered">
    <thead>
      <tr><th>ID</th><th>Material Type</th><th>Deleted?</th><th>Actions</th></tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['materialtype']) ?></td>
        <td><?= $row['is_deleted'] ? "Yes" : "No" ?></td>
        <td>
          <?php if (!$row['is_deleted']): ?>
            <button 
              class="btn btn-warning btn-sm editBtn" 
              data-id="<?= $row['id'] ?>" 
              data-materialtype="<?= htmlspecialchars($row['materialtype']) ?>"
              data-bs-toggle="modal" 
              data-bs-target="#editModal">
              Edit
            </button>
            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Soft Delete</a>
          <?php else: ?>
            <a href="?restore=<?= $row['id'] ?>" class="btn btn-secondary btn-sm">Restore</a>
          <?php endif; ?>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Single Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Material Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
        <div class="mb-3">
          <label for="edit-materialtype" class="form-label">Material Type</label>
          <input type="text" class="form-control" name="materialtype" id="edit-materialtype" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Dynamic modal data population
document.querySelectorAll('.editBtn').forEach(button => {
  button.addEventListener('click', () => {
    document.getElementById('edit-id').value = button.getAttribute('data-id');
    document.getElementById('edit-materialtype').value = button.getAttribute('data-materialtype');
  });
});
</script>

</body>
</html>
