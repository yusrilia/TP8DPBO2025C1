<div class="card">
    <div class="card-header bg-warning text-white">
        <h3 class="card-title">Edit Payment</h3>
    </div>
    <div class="card-body">
        <form action="index.php?controller=payment&action=edit&id=<?php echo $payment['payment_id']; ?>" method="post">
            <div class="mb-3">
                <label for="payment_id" class="form-label">Payment ID</label>
                <input type="text" class="form-control" id="payment_id" value="<?php echo htmlspecialchars($payment['payment_id']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select class="form-select" id="student_id" name="student_id" required>
                    <option value="">Select Student</option>
                    <?php foreach ($students as $student): ?>
                        <option value="<?php echo htmlspecialchars($student['id']); ?>" <?php echo ($student['id'] == $payment['student_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($student['name']); ?> (<?php echo htmlspecialchars($student['id']); ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="payment_date" class="form-label">Payment Date</label>
                <input type="date" class="form-control" id="payment_date" name="payment_date" value="<?php echo htmlspecialchars($payment['payment_date']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount (Rp)</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($payment['amount']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="">Select Payment Method</option>
                    <?php foreach ($paymentMethods as $value => $label): ?>
                        <option value="<?php echo htmlspecialchars($value); ?>" <?php echo ($value == $payment['payment_method']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($label); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="">Select Status</option>
                    <?php foreach ($paymentStatuses as $value => $label): ?>
                        <option value="<?php echo htmlspecialchars($value); ?>" <?php echo ($value == $payment['status']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($label); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?controller=payment&action=index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>