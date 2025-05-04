<?php
require_once 'controllers/BaseController.php';
require_once 'models/Enrollment.php';

class EnrollmentController extends BaseController {
    private $enrollmentModel;
    
    public function __construct() {
        $this->enrollmentModel = new Enrollment();
    }
    
    public function index() {
        $enrollments = $this->enrollmentModel->getAll();
        $this->render('enrollments/index', ['enrollments' => $enrollments]);
    }
    
    public function create() {
        $students = $this->enrollmentModel->getAllStudents();
        $courses = $this->enrollmentModel->getCourseCodes();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'student_id' => $_POST['student_id'],
                'course_code' => $_POST['course_code'],
                'enrolled_date' => $_POST['enrolled_date'],
                'grade' => $_POST['grade']
            ];
            
            if ($this->enrollmentModel->create($data)) {
                $this->redirect('index.php?controller=enrollment&action=index');
            }
        }
        
        $this->render('enrollments/create', [
            'students' => $students,
            'courses' => $courses
        ]);
    }
    
    public function edit() {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?controller=enrollment&action=index');
        }
        
        $id = $_GET['id'];
        $enrollment = $this->enrollmentModel->getById($id);
        
        if (!$enrollment) {
            $this->redirect('index.php?controller=enrollment&action=index');
        }
        
        $students = $this->enrollmentModel->getAllStudents();
        $courses = $this->enrollmentModel->getCourseCodes();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'student_id' => $_POST['student_id'],
                'course_code' => $_POST['course_code'],
                'enrolled_date' => $_POST['enrolled_date'],
                'grade' => $_POST['grade']
            ];
            
            if ($this->enrollmentModel->update($id, $data)) {
                $this->redirect('index.php?controller=enrollment&action=index');
            }
        }
        
        $this->render('enrollments/edit', [
            'enrollment' => $enrollment,
            'students' => $students,
            'courses' => $courses
        ]);
    }
    
    public function delete() {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?controller=enrollment&action=index');
        }
        
        $id = $_GET['id'];
        
        if ($this->enrollmentModel->delete($id)) {
            $this->redirect('index.php?controller=enrollment&action=index');
        }
    }
}
?>