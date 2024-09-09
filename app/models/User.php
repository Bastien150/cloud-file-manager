<?php
require_once __DIR__ . '/../helpers/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$username, $email, $hashedPassword]);
    }

    public function findByusername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $result = $this->db->query($sql, [$username]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }
    public function getActualUser($iduser) {
        $sql = "SELECT * from users where id = ?";
        $result = $this->db->query($sql, [$iduser]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUser() {
        $sql = "SELECT * from users";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}