<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Gold & Silver Rate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Date</label>
          <input type="datetime-local" class="form-control" name="date" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Gold Rate (Tola)</label>
          <input type="number" step="0.01" class="form-control" name="gold_rate_tola" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Silver Rate (Tola)</label>
          <input type="number" step="0.01" class="form-control" name="silver_rate_tola" required>
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
        <h5 class="modal-title" id="editModalLabel">Edit Gold & Silver Rate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
        <div class="mb-3">
          <label class="form-label">Date</label>
          <input type="datetime-local" class="form-control" name="date" id="edit-date" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Gold Rate (Tola)</label>
          <input type="number" step="0.01" class="form-control" name="gold_rate_tola" id="edit-gold" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Silver Rate (Tola)</label>
          <input type="number" step="0.01" class="form-control" name="silver_rate_tola" id="edit-silver" required>
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
// Fill edit modal
document.querySelectorAll('.editBtn').forEach(button => {
  button.addEventListener('click', () => {
    document.getElementById('edit-id').value = button.getAttribute('data-id');
    document.getElementById('edit-date').value = button.getAttribute('data-date');
    document.getElementById('edit-gold').value = button.getAttribute('data-gold');
    document.getElementById('edit-silver').value = button.getAttribute('data-silver');
  });
});
</script>
