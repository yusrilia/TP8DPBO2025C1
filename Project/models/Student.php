<?php
require_once 'models/BaseModel.php';

class Student extends BaseModel {
    protected $table = 'students';
    
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($sql);
        $students = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
        
        return $students;
    }
    
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return null;
    }
    
    public function create($data) {
        $sql = "INSERT INTO {$this->table} (id, name, phone, join_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $data['id'], $data['name'], $data['phone'], $data['join_date']);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET name = ?, phone = ?, join_date = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $data['name'], $data['phone'], $data['join_date'], $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function generateNewId() {
        $sql = "SELECT MAX(SUBSTRING(id, 2)) as max_id FROM {$this->table}";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        
        $maxId = (int)$row['max_id'];
        $newId = $maxId + 1;
        
        return 'S' . str_pad($newId, 3, '0', STR_PAD_LEFT);
    }
}
?>