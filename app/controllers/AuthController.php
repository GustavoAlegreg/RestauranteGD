<?php
// app/controllers/AuthController.php
require_once __DIR__ . '/../dao/UserDAO.php';
require_once __DIR__ . '/../../config/db.php';

session_start();

class AuthController {
    private $userDAO;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userDAO = new UserDAO($db);
    }

    public function login($username, $password) {
        $user = $this->userDAO->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../app/views/carta.php"); // Redirige a dashboard
        } else {
            $_SESSION['error'] = "Usuario o contraseña incorrectos.";
            header("Location: ../app/views/login.php");
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    $authController->login($_POST['username'], $_POST['password']);
}
?>
