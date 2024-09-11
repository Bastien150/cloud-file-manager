<?php
require_once __DIR__ . '/../helpers/Database.php';

class File {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /* ajoute le fichier en bdd en vérifiant qu'il n'existe pas dedans */
    public function create($userId, $name, $path, $mimeType, $size, $parentId = null, $isDirectory = false) {
        // Vérifier si un fichier avec le même nom, la même taille et le même chemin existe déjà
        $checkSql = "SELECT id FROM files WHERE user_id = ? AND name = ? AND path = ? AND size = ? AND parent_id " . ($parentId === null ? "IS NULL" : "= ?");
        $params = [$userId, $name, $path, $size];
        if ($parentId !== null) {
            $params[] = $parentId;
        }
    
        $existingFile = $this->db->query($checkSql, $params)->fetch();
    
        if ($existingFile) {
            return false; 
        }
    
        // Insérer le nouveau fichier
        $sql = "INSERT INTO files (user_id, name, path, mime_type, size, parent_id, is_directory) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, [$userId, $name, $path, $mimeType, $size, $parentId, $isDirectory]);
        return $this->db->lastInsertId();
    }

    /* recupère les fichier en fonction du créateur */
    public function getByUserIdAndParentId($userId, $parentId = null) {
        // Récupérer tous les fichiers de l'utilisateur pour le dossier parent spécifié
        $sql = "SELECT * FROM files WHERE user_id = ? AND parent_id " . ($parentId === null ? "= 0" : "= ?") . " ORDER BY is_directory DESC, name ASC";
        $params = [$userId];
        if ($parentId !== null) {
            $params[] = $parentId;
        }
        $result = $this->db->query($sql, $params);
        $files = $result->fetchAll(PDO::FETCH_ASSOC);
    
        // Vérifier l'existence des fichiers et supprimer les entrées invalides
        return $this->verifyAndCleanFiles($files);
    }
    
    /* verif que le fichier existe sinon delete en bdd */
    private function verifyAndCleanFiles($files) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }
        $validFiles = [];
        $deletedFileIds = [];
    
        foreach ($files as $file) {
            if ($file['is_directory']) {
                $validFiles[] = $file;
                continue;
            }
    
            $fullPath = UPLOAD_DIR .'/user_'.$_SESSION['user_id'].'/'. $file['path'];
            if (file_exists($fullPath) && filesize($fullPath) == $file['size']) {
                $validFiles[] = $file;
            } else {
                $deletedFileIds[] = $file['id'];
            }
        }
    
        // Supprimer les fichiers invalides de la base de données
        if (!empty($deletedFileIds)) {
            $deleteSql = "DELETE FROM files WHERE id IN (" . implode(',', array_fill(0, count($deletedFileIds), '?')) . ")";
            $this->db->query($deleteSql, $deletedFileIds);
        }
    
        return $validFiles;
    }

    /* recup file avec son id */
    public function getById($id) {
        $sql = "SELECT * FROM files WHERE id = ?";
        $result = $this->db->query($sql, [$id]);
        return $result->fetch();
    }

    /* recup le chemin */
    public function getPath($id) {
        $path = [];
        $current = $this->getById($id);
        while ($current) {
            array_unshift($path, $current);
            $current = $current['parent_id'] ? $this->getById($current['parent_id']) : null;
        }
        return $path;
    }

    /* supp les files and folder */
    public function delete($id) {
        // Supprimer d'abord tous les enfants
        $sql = "DELETE FROM files WHERE parent_id = ?";
        $this->db->query($sql, [$id]);
    
        // Ensuite, supprimer le fichier/dossier lui-même
        $sql = "DELETE FROM files WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }

    /* recup project */
    public function getProject(){
        $sql = "SELECT id, title, spe_title, content, project_date, icon, path FROM projects";
        return $this->db->query($sql, []);   
    }
}