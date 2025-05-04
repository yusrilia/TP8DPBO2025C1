<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Students List</h2>
    <a href="index.php?controller=student&action=create" class="btn btn-primary">Add New Student</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Join Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($students)): ?>
            <tr>
                <td colspan="5" class="text-center">No students found</td>
            </tr>
        <?php else: ?>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['id']); ?></td>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td><?php echo htmlspecialchars($student['phone']); ?></td>
                    <td><?php echo htmlspecialchars($student['join_date']); ?></td>
                    <td>
                        <a href="index.php?controller=student&action=edit&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                        <a href="index.php?controller=student&action=delete&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>