<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register($username, $email, $password) {
        // Vérification simple des données
        if (empty($username) || empty($email) || empty($password)) {
            return false;
        }
        
        // Vérifier si l'email existe déjà
        if ($this->userModel->findByusername($username)) {
            return false;
        }

        return $this->userModel->create($username, $email, $password);
    }

    public function login($username, $password) {
        $user = $this->userModel->findByusername($username);
        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function getinfoUser($iduser) {
        return $this->userModel->getActualUser($iduser);
    }

    public function getAllUser() {
        return $this->userModel->getAllUser();
    }
}