<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Add New Enrollment</h3>
    </div>
    <div class="card-body">
        <form action="index.php?controller=enrollment&action=create" method="post">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select class="form-select" id="student_id" name="student_id" required>
                    <option value="">Select Student</option>
                    <?php foreach ($students as $student): ?>
                        <option value="<?php echo htmlspecialchars($student['id']); ?>">
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
                        <option value="<?php echo htmlspecialchars($code); ?>">
                            <?php echo htmlspecialchars($name); ?> (<?php echo htmlspecialchars($code); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="enrolled_date" class="form-label">Enrolled Date</label>
                <input type="date" class="form-control" id="enrolled_date" name="enrolled_date" required>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <select class="form-select" id="grade" name="grade">
                    <option value="">Not Graded Yet</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?controller=enrollment&action=index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>