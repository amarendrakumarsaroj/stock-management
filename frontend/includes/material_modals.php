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
          <label for="add-materialtype" class="form-label">Material Type</label>
          <input type="text" class="form-control" name="materialtype" id="add-materialtype" required>
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
          <label for="edit-materialtype" class="form-label">Material Type</label>
          <input type="text" class="form-control" name="materialtype" id="edit-materialtype" required>
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
// Fill edit modal with material type data
document.querySelectorAll('.editBtn').forEach(button => {
  button.addEventListener('click', () => {
    document.getElementById('edit-id').value = button.getAttribute('data-id');
    document.getElementById('edit-materialtype').value = button.getAttribute('data-materialtype');
  });
});
</script>
