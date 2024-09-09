<?php
class FileSystem {
    public static function saveUploadedFile($file) {
        $uploadDir = UPLOAD_DIR;
        
        // Nettoyer le nom du fichier et extraire le nom de base
        $fileName = basename($file['name']);
        
        // Générer un nom unique
        $uniqueName = uniqid() . '_' . $fileName;
        
        // Construire le chemin complet
        $filePath = $uploadDir . $uniqueName;
        
        // Assurer que le répertoire de destination existe
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return $uniqueName;
        }
        return false;
    }
    public static function createDirectory($directoryPath, $permissions = 0777) {
        if (!is_dir($directoryPath)) {
            $uploadDir = UPLOAD_DIR;
            $path = $uploadDir . $directoryPath;
            mkdir($path, $permissions, true);
        }
    }
}