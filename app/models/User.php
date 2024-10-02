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

    public function getUsernames() {
        $sql = "SELECT username from users";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePassword($password){
        $id = $_SESSION['user_id'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $this->db->query($sql, [$hashedPassword, $id]);
    }

    public function deleteUserAndFile($id){
        /* del file du user */
        $sql = "DELETE FROM files WHERE user_id = ?";
        $this->db->query($sql, [$id]);
        /* del user */
        $sql = "DELETE FROM users WHERE id = ?";
        $this->db->query($sql, [$id]);
    }

    public function verifyVisitor($ip){
        $sql = "SELECT COUNT(*) AS res FROM visitor WHERE ip = ?";
        $res = $this->db->query($sql, [$ip]);
        if ($res->fetch(PDO::FETCH_ASSOC)['res'] == 0) {
            $sql = "INSERT INTO visitor (ip) VALUES (?)";
            $res = $this->db->query($sql, [$ip]);
        }
    }
}