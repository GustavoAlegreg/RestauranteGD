<?php
require_once '../app/models/User.php';
require_once '../app/dao/UserDAO.php';


class UserController {
    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function index() {
        $users = $this->userDAO->all();
        include '../app/views/users.php';
    }

    public function create() {
        // Inicializamos $user con un objeto vacío antes de cargar la vista
        $user = new User(null, '', '');  // Asumiendo que tu constructor requiere 3 parámetros

        if ($_POST) {
            $user = new User(null, $_POST['name'], $_POST['email']);
            $this->userDAO->create($user);
            header("Location: index.php");
            exit(); // Importante para evitar que el código continúe después del redireccionamiento
        }

        include '../app/views/user_form.php';
    }

    public function edit($id) {
        $user = $this->userDAO->read($id); // Obtiene el usuario desde la base de datos

        if ($_POST) {
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $this->userDAO->update($user);
            header("Location: index.php");
            exit();
        }

        include '../app/views/user_form.php';
    }

    public function delete($id) {
        $this->userDAO->delete($id);
        header("Location: index.php");
        exit();
    }
}
?>