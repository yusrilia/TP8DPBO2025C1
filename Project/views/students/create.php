<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Add New Student</h3>
    </div>
    <div class="card-body">
        <form action="index.php?controller=student&action=create" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="join_date" class="form-label">Join Date</label>
                <input type="date" class="form-control" id="join_date" name="join_date" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?controller=student&action=index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>