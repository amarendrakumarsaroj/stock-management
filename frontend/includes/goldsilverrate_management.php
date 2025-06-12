<h2>Gold & Silver Rate Management</h2>

<!-- Add New Button -->
<div class="mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add New Rate</button>
</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Date</th>
      <th>Gold Rate (Tola)</th>
      <th>Silver Rate (Tola)</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['date']) ?></td>
        <td><?= $row['gold_rate_tola'] ?></td>
        <td><?= $row['silver_rate_tola'] ?></td>
        <td>
          <button 
            class="btn btn-primary btn-sm editBtn" 
            data-id="<?= $row['id'] ?>" 
            data-date="<?= $row['date'] ?>"
            data-gold="<?= $row['gold_rate_tola'] ?>"
            data-silver="<?= $row['silver_rate_tola'] ?>"
            data-bs-toggle="modal" 
            data-bs-target="#editModal">
            Edit
          </button>
          <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php include 'includes/goldsilverrate_modals.php'; ?>
