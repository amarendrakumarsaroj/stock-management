<h2>User Management</h2>

<div class="mb-3">
  <a href="signup.php" class="btn btn-success">Add New User</a>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Deleted?</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= $row['is_deleted'] ? "Yes" : "No" ?></td>
        <td>
          <?php if (!$row['is_deleted']): ?>
            <button class="btn btn-primary btn-sm editBtn"
              data-id="<?= $row['id'] ?>"
              data-username="<?= htmlspecialchars($row['username']) ?>"
              data-bs-toggle="modal" data-bs-target="#editModal">
              Edit
            </button>
            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
          <?php else: ?>
            <span class="text-muted">Deleted</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
        <div class="mb-3">
          <label for="edit-username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="edit-username" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="update" class="btn btn-success">Save Changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<script>
// Fill modal with user data
document.querySelectorAll('.editBtn').forEach(button => {
  button.addEventListener('click', () => {
    document.getElementById('edit-id').value = button.getAttribute('data-id');
    document.getElementById('edit-username').value = button.getAttribute('data-username');
  });
});
</script>
