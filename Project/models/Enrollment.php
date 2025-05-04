<?php
require_once 'models/BaseModel.php';

class Enrollment extends BaseModel {
    protected $table = 'enrollment';
    
    public function getAll() {
        $sql = "SELECT e.*, s.name as student_name 
                FROM {$this->table} e
                JOIN students s ON e.student_id = s.id
                ORDER BY e.enrollment_id DESC";
        $result = $this->conn->query($sql);
        $enrollments = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $enrollments[] = $row;
            }
        }
        
        return $enrollments;
    }
    
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE enrollment_id = ?";
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
        $sql = "INSERT INTO {$this->table} (student_id, course_code, enrolled_date, grade) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $data['student_id'], $data['course_code'], $data['enrolled_date'], $data['grade']);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET student_id = ?, course_code = ?, enrolled_date = ?, grade = ? WHERE enrollment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $data['student_id'], $data['course_code'], $data['enrolled_date'], $data['grade'], $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE enrollment_id = ?";
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
    
    public function getCourseCodes() {
        // Dalam kasus nyata, ini bisa diambil dari tabel courses
        return [
            'CS101' => 'Computer Science 101',
            'MATH201' => 'Mathematics 201',
            'ENG102' => 'English 102'
        ];
    }
}
?>