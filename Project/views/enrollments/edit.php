<div class="card">
    <div class="card-header bg-warning text-white">
        <h3 class="card-title">Edit Enrollment</h3>
    </div>
    <div class="card-body">
        <form action="index.php?controller=enrollment&action=edit&id=<?php echo $enrollment['enrollment_id']; ?>" method="post">
            <div class="mb-3">
                <label for="enrollment_id" class="form-label">Enrollment ID</label>
                <input type="text" class="form-control" id="enrollment_id" value="<?php echo htmlspecialchars($enrollment['enrollment_id']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select class="form-select" id="student_id" name="student_id" required>
                    <option value="">Select Student</option>
                    <?php foreach ($students as $student): ?>
                        <option value="<?php echo htmlspecialchars($student['id']); ?>" <?php echo ($student['id'] == $enrollment['student_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($student['name']); ?> (<?php echo htmlspecialchars($student['id']); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="course_code" class="form-label">Course</label>
                <select class="form-select" id="course_code" name="course_code" required>
                    <option value="">Select Course</option>
                    <?php foreach ($courses as $code => $name): ?>
                        <option value="<?php echo htmlspecialchars($code); ?>" <?php echo ($code == $enrollment['course_code']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($name); ?> (<?php echo htmlspecialchars($code); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="enrolled_date" class="form-label">Enrolled Date</label>
                <input type="date" class="form-control" id="enrolled_date" name="enrolled_date" value="<?php echo htmlspecialchars($enrollment['enrolled_date']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select class="form-select" id="grade" name="grade">
                    <option value="">Not Graded Yet</option>
                    <option value="A" <?php echo ($enrollment['grade'] == 'A') ? 'selected' : ''; ?>>A</option>
                    <option value="A-" <?php echo ($enrollment['grade'] == 'A-') ? 'selected' : ''; ?>>A-</option>
                    <option value="B+" <?php echo ($enrollment['grade'] == 'B+') ? 'selected' : ''; ?>>B+</option>
                    <option value="B" <?php echo ($enrollment['grade'] == 'B') ? 'selected' : ''; ?>>B</option>
                    <option value="B-" <?php echo ($enrollment['grade'] == 'B-') ? 'selected' : ''; ?>>B-</option>
                    <option value="C+" <?php echo ($enrollment['grade'] == 'C+') ? 'selected' : ''; ?>>C+</option>
                    <option value="C" <?php echo ($enrollment['grade'] == 'C') ? 'selected' : ''; ?>>C</option>
                    <option value="C-" <?php echo ($enrollment['grade'] == 'C-') ? 'selected' : ''; ?>>C-</option>
                    <option value="D" <?php echo ($enrollment['grade'] == 'D') ? 'selected' : ''; ?>>D</option>
                    <option value="F" <?php echo ($enrollment['grade'] == 'F') ? 'selected' : ''; ?>>F</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?controller=enrollment&action=index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>