<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    $authController->login($_POST['username'], $_POST['password']);
} else {
    require_once __DIR__ . '/../app/views/login.php';
}
?>
