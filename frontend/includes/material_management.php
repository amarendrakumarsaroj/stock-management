<h2>Material Type Management</h2>

<!-- Add New Material Type Button -->
<div class="mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add New Material Type</button>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Material Type</th>
      <th>Deleted?</th>
      <th>Actions</th>
    </tr>
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
              class="btn btn-primary btn-sm editBtn" 
              data-id="<?= $row['id'] ?>" 
              data-materialtype="<?= htmlspecialchars($row['materialtype']) ?>"
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

<?php include 'includes/material_modals.php'; ?>
