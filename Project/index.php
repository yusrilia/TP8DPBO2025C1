<?php
// Define base path
define('BASE_PATH', __DIR__);

// Main router file
require_once 'controllers/StudentController.php';
require_once 'controllers/EnrollmentController.php';
require_once 'controllers/PaymentController.php';

// Default controller and action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'student';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Route to the appropriate controller and action
switch ($controller) {
    case 'student':
        $studentController = new StudentController();
        
        switch ($action) {
            case 'index':
                $studentController->index();
                break;
            case 'create':
                $studentController->create();
                break;
            case 'edit':
                $studentController->edit();
                break;
            case 'delete':
                $studentController->delete();
                break;
            default:
                $studentController->index();
                break;
        }
        break;
        
    case 'enrollment':
        $enrollmentController = new EnrollmentController();
        
        switch ($action) {
            case 'index':
                $enrollmentController->index();
                break;
            case 'create':
                $enrollmentController->create();
                break;
            case 'edit':
                $enrollmentController->edit();
                break;
            case 'delete':
                $enrollmentController->delete();
                break;
            default:
                $enrollmentController->index();
                break;
        }
        break;
        
    case 'payment':
        $paymentController = new PaymentController();
        
        switch ($action) {
            case 'index':
                $paymentController->index();
                break;
            case 'create':
                $paymentController->create();
                break;
            case 'edit':
                $paymentController->edit();
                break;
            case 'delete':
                $paymentController->delete();
                break;
            default:
                $paymentController->index();
                break;
        }
        break;
        
    default:
        $studentController = new StudentController();
        $studentController->index();
        break;
}
?>