<h2>Material Type Management</h2>

<!-- Add New Material Type Button -->
<div class="mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add New Material Type</button>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Material Name</th>
      <th>Deleted?</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= $row['is_deleted'] ? "Yes" : "No" ?></td>
        <td>
          <?php if (!$row['is_deleted']): ?>
            <button 
              class="btn btn-primary btn-sm editBtn" 
              data-id="<?= $row['id'] ?>" 
              data-name="<?= htmlspecialchars($row['name']) ?>"
              data-bs-toggle="modal" 
              data-bs-target="#editModal">
              Edit
            </button>
            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Soft Delete</a>
          <?php else: ?>
            <span class="text-muted">Deleted</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Material Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="add-name" class="form-label">Material Name</label>
          <input type="text" class="form-control" name="name" id="add-name" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add" class="btn btn-success">Add</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Modal -->
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
          <label for="edit-name" class="form-label">Material Name</label>
          <input type="text" class="form-control" name="name" id="edit-name" required>
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
// Fill modal with material data
document.querySelectorAll('.editBtn').forEach(button => {
  button.addEventListener('click', () => {
    document.getElementById('edit-id').value = button.getAttribute('data-id');
    document.getElementById('edit-name').value = button.getAttribute('data-name');
  });
});
</script>
