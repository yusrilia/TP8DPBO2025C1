<?php
require_once 'controllers/BaseController.php';
require_once 'models/Student.php';

class StudentController extends BaseController {
    private $studentModel;
    
    public function __construct() {
        $this->studentModel = new Student();
    }
    
    public function index() {
        $students = $this->studentModel->getAll();
        $this->render('students/index', ['students' => $students]);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newId = $this->studentModel->generateNewId();
            $data = [
                'id' => $newId,
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date']
            ];
            
            if ($this->studentModel->create($data)) {
                $this->redirect('index.php?controller=student&action=index');
            }
        }
        
        $this->render('students/create');
    }
    
    public function edit() {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?controller=student&action=index');
        }
        
        $id = $_GET['id'];
        $student = $this->studentModel->getById($id);
        
        if (!$student) {
            $this->redirect('index.php?controller=student&action=index');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date']
            ];
            
            if ($this->studentModel->update($id, $data)) {
                $this->redirect('index.php?controller=student&action=index');
            }
        }
        
        $this->render('students/edit', ['student' => $student]);
    }
    
    public function delete() {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?controller=student&action=index');
        }
        
        $id = $_GET['id'];
        
        if ($this->studentModel->delete($id)) {
            $this->redirect('index.php?controller=student&action=index');
        }
    }
}
?>