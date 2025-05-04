<?php
require_once 'controllers/BaseController.php';
require_once 'models/Payment.php';

class PaymentController extends BaseController {
    private $paymentModel;
    
    public function __construct() {
        $this->paymentModel = new Payment();
    }
    
    public function index() {
        $payments = $this->paymentModel->getAll();
        $this->render('payments/index', ['payments' => $payments]);
    }
    
    public function create() {
        $students = $this->paymentModel->getAllStudents();
        $paymentMethods = $this->paymentModel->getPaymentMethods();
        $paymentStatuses = $this->paymentModel->getPaymentStatuses();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'student_id' => $_POST['student_id'],
                'payment_date' => $_POST['payment_date'],
                'amount' => $_POST['amount'],
                'payment_method' => $_POST['payment_method'],
                'status' => $_POST['status']
            ];
            
            if ($this->paymentModel->create($data)) {
                $this->redirect('index.php?controller=payment&action=index');
            }
        }
        
        $this->render('payments/create', [
            'students' => $students,
            'paymentMethods' => $paymentMethods,
            'paymentStatuses' => $paymentStatuses
        ]);
    }
    
    public function edit() {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?controller=payment&action=index');
        }
        
        $id = $_GET['id'];
        $payment = $this->paymentModel->getById($id);
        
        if (!$payment) {
            $this->redirect('index.php?controller=payment&action=index');
        }
        
        $students = $this->paymentModel->getAllStudents();
        $paymentMethods = $this->paymentModel->getPaymentMethods();
        $paymentStatuses = $this->paymentModel->getPaymentStatuses();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'student_id' => $_POST['student_id'],
                'payment_date' => $_POST['payment_date'],
                'amount' => $_POST['amount'],
                'payment_method' => $_POST['payment_method'],
                'status' => $_POST['status']
            ];
            
            if ($this->paymentModel->update($id, $data)) {
                $this->redirect('index.php?controller=payment&action=index');
            }
        }
        
        $this->render('payments/edit', [
            'payment' => $payment,
            'students' => $students,
            'paymentMethods' => $paymentMethods,
            'paymentStatuses' => $paymentStatuses
        ]);
    }
    
    public function delete() {
        if (!isset($_GET['id'])) {
            $this->redirect('index.php?controller=payment&action=index');
        }
        
        $id = $_GET['id'];
        
        if ($this->paymentModel->delete($id)) {
            $this->redirect('index.php?controller=payment&action=index');
        }
    }
}
?>