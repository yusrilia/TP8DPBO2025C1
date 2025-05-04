<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Tuition Payments</h2>
    <a href="index.php?controller=payment&action=create" class="btn btn-primary">Add New Payment</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Payment Date</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($payments)): ?>
            <tr>
                <td colspan="7" class="text-center">No payments found</td>
            </tr>
        <?php else: ?>
            <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($payment['payment_id']); ?></td>
                    <td><?php echo htmlspecialchars($payment['student_name']); ?> (<?php echo htmlspecialchars($payment['student_id']); ?>)</td>
                    <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
                    <td>Rp <?php echo number_format($payment['amount'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($payment['payment_method']); ?></td>
                    <td>
                        <span class="badge <?php 
                            echo $payment['status'] === 'PAID' ? 'bg-success' : 
                                ($payment['status'] === 'PENDING' ? 'bg-warning' : 'bg-danger'); 
                        ?>">
                            <?php echo htmlspecialchars($payment['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="index.php?controller=payment&action=edit&id=<?php echo $payment['payment_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                        <a href="index.php?controller=payment&action=delete&id=<?php echo $payment['payment_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this payment?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>