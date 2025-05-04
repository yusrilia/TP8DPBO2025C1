<?php
require_once 'models/BaseModel.php';

class Payment extends BaseModel {
    protected $table = 'tuition_payment';
    
    public function getAll() {
        $sql = "SELECT p.*, s.name as student_name 
                FROM {$this->table} p
                JOIN students s ON p.student_id = s.id
                ORDER BY p.payment_id DESC";
        $result = $this->conn->query($sql);
        $payments = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $payments[] = $row;
            }
        }
        
        return $payments;
    }
    
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE payment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return null;
    }
    
    public function create($data) {
        $sql = "INSERT INTO {$this->table} (student_id, payment_date, amount, payment_method, status) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdss", 
            $data['student_id'], 
            $data['payment_date'], 
            $data['amount'], 
            $data['payment_method'], 
            $data['status']
        );
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function update($id, $data) {
        $sql = "UPDATE {$this->table} 
                SET student_id = ?, payment_date = ?, amount = ?, payment_method = ?, status = ? 
                WHERE payment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdssi", 
            $data['student_id'], 
            $data['payment_date'], 
            $data['amount'], 
            $data['payment_method'], 
            $data['status'], 
            $id
        );
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE payment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function getAllStudents() {
        $sql = "SELECT id, name FROM students ORDER BY name";
        $result = $this->conn->query($sql);
        $students = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
        
        return $students;
    }
    
    public function getPaymentMethods() {
        return [
            'Transfer' => 'Bank Transfer',
            'Cash' => 'Cash Payment',
            'E-Wallet' => 'Electronic Wallet'
        ];
    }
    
    public function getPaymentStatuses() {
        return [
            'PAID' => 'Paid',
            'PENDING' => 'Pending',
            'FAILED' => 'Failed'
        ];
    }
}
?>