<?php
// app/dao/UserDAO.php
require_once __DIR__ . '/../models/User.php';

class UserDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByUsername($username) {
        $user = new User($this->db);
        return $user->findUserByUsername($username);
    }
}
?>
