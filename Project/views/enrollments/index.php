<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Enrollments List</h2>
    <a href="index.php?controller=enrollment&action=create" class="btn btn-primary">Add New Enrollment</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Course</th>
            <th>Enrolled Date</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($enrollments)): ?>
            <tr>
                <td colspan="6" class="text-center">No enrollments found</td>
            </tr>
        <?php else: ?>
            <?php foreach ($enrollments as $enrollment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($enrollment['enrollment_id']); ?></td>
                    <td><?php echo htmlspecialchars($enrollment['student_name']); ?> (<?php echo htmlspecialchars($enrollment['student_id']); ?>)</td>
                    <td><?php echo htmlspecialchars($enrollment['course_code']); ?></td>
                    <td><?php echo htmlspecialchars($enrollment['enrolled_date']); ?></td>
                    <td><?php echo htmlspecialchars($enrollment['grade']); ?></td>
                    <td>
                        <a href="index.php?controller=enrollment&action=edit&id=<?php echo $enrollment['enrollment_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                        <a href="index.php?controller=enrollment&action=delete&id=<?php echo $enrollment['enrollment_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enrollment?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>