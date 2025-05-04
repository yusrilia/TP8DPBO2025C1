<?php
abstract class BaseController {
    protected function render($view, $data = []) {
        extract($data);
        
        include 'views/templates/header.php';
        include "views/{$view}.php";
        include 'views/templates/footer.php';
    }
    
    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}
?>