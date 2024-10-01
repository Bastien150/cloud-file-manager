<?php
require_once __DIR__ . '/../models/File.php';

class FileController {
    private $fileModel;

    public function __construct() {
        $this->fileModel = new File();
    }

    /* accédé au cloud */
    public function index($parentId = null, $editFileId = null, $editFileNewName = null) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }
        //edit files
        if ($editFileId != null && $editFileNewName != null) {
            $filesupdate = $this->fileModel->updateNameFile($editFileId, $editFileNewName);
        }
        $userId = $_SESSION['user_id'];
        $files = $this->fileModel->getByUserIdAndParentId($userId, $parentId);
        $currentPath = $parentId ? $this->fileModel->getPath($parentId) : [];

        require_once __DIR__ . '/../views/cloud.php';
    }

    public function gotoproject() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }
        $projects = $this->fileModel->getProject();
        require_once __DIR__ . '/../views/projet.php';
    }

    public function createDirectory() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $directoryName = $_POST['directory_name'] ?? '';
            $parentId = $_POST['parent_id'] ?? null;

            if (!empty($directoryName)) {
                $userDir = $this->getUserDir($userId);
                $parentPath = $this->getParentPath($parentId);
                $directoryPath = $userDir . $parentPath . $directoryName;
                if (!file_exists($directoryPath)) {
                    mkdir($directoryPath, 0777, true);
                }
                $this->fileModel->create($userId, $directoryName, $parentPath . $directoryName . '/', 'directory', 0, $parentId, true);
            }

            header('Location: ' . BASE_URL . '/index.php?route=files' . ($parentId ? '&parent_id=' . $parentId : ''));
            exit;
        }
    }

    public function upload() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $userId = $_SESSION['user_id'];
            $file = $_FILES['file'];
            $parentId = $_POST['parent_id'] ?? null;

            $userDir = $this->getUserDir($userId);
            $parentPath = $this->getParentPath($parentId);
            $uploadDir = $userDir . $parentPath;
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = $file['name'];
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $this->fileModel->create($userId, $fileName, $parentPath . $fileName, $file['type'], $file['size'], $parentId);
            }

            header('Location: ' . BASE_URL . '/index.php?route=files' . ($parentId ? '&parent_id=' . $parentId : ''));
            exit;
        }
    }

    public function download($fileId) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }

        $file = $this->fileModel->getById($fileId);

        if ($file && $file['user_id'] == $_SESSION['user_id']) {
            $userDir = $this->getUserDir($file['user_id']);
            $filePath = $userDir . $file['path'];
            if (file_exists($filePath)) {
                header('Content-Type: ' . $file['mime_type']);
                header('Content-Disposition: attachment; filename="' . $file['name'] . '"');
                readfile($filePath);
                exit;
            }
        }

        header('Location: ' . BASE_URL . '/index.php?route=files');
        exit;
    }

    public function delete($fileId) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }
    
        $file = $this->fileModel->getById($fileId);
    
        if ($file && $file['user_id'] == $_SESSION['user_id']) {
            $userDir = $this->getUserDir($file['user_id']);
            $filePath = $userDir . $file['path'];
            if ($file['is_directory']) {
                $this->deleteDirectory($filePath);
            } else {
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $this->fileModel->delete($fileId);
        }
    
        $parentId = $file['parent_id'] ?? null;
        header('Location: ' . BASE_URL . '/index.php?route=files' . ($parentId ? '&parent_id=' . $parentId : ''));
        exit;
    }
    
    private function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
        return rmdir($dir);
    }

    private function getParentPath($parentId) {
        if ($parentId) {
            $path = '';
            $current = $this->fileModel->getById($parentId);
            while ($current) {
                $path = $current['name'] . '/' . $path;
                $current = $current['parent_id'] ? $this->fileModel->getById($current['parent_id']) : null;
            }
            return $path;
        }
        return '';
    }

    private function getUserDir($userId) {
        $userDir = UPLOAD_DIR . 'user_' . $userId . '/';
        if (!file_exists($userDir)) {
            mkdir($userDir, 0777, true);
        }
        return $userDir;
    }

    public function adminfiles($parentId , $userselect, $users, $infoUserSelect) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/index.php?route=login');
            exit;
        }
        if ($infoUserSelect && $infoUserSelect != ""){
            $infoUserSelect = $infoUserSelect[0];
        }
        $projectPathList = $this->fileModel->scanDirectory();
        $projects = $this->fileModel->getProject();
        $userId = $_SESSION['user_id'];
        $currentPath = $parentId ? $this->fileModel->getPath($parentId) : [];
        /* $files = $this->fileModel->getByUserIdAndParentId($userId, $parentId); */
        if ($userselect != null){
            $files = $this->fileModel->getByUserIdAndParentId($userselect, $parentId);
        }else{
             $files = null;
        }
        require_once __DIR__ . '/../views/admin.php';
    }

    public function formatSize($size) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $i = 0;
        while ($size >= 1024 && $i < 4) {
            $size /= 1024;
            $i++;
        }
        return round($size, 2) . ' ' . $units[$i];
    }

    public function getFileIcon($fileName) {
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        switch ($extension) {
            case 'pdf':
                return 'pdf.png';
            case 'txt':
                return 'txt.png';
            case 'pptx':
            case 'ppt':
                return 'pptx.png';
            case 'xls':
            case 'xlsx':
                return 'xls.png';
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                return 'img.png';
            case 'doc':
            case 'docx':
                return 'docx.png';
            case 'exe':
            case 'bat':
            case 'cmd':
                        return 'exe.png';
            case 'mp3':
                return 'mp3.png';
            case 'mp4':
                return 'mp4.png';
            case 'zip':
            case 'rar':
            case '7z':
                return 'compress.png';
            default:
                return 'unknown.png';
        }
    }
    
    public function openfile($fileName, $id) {
        $path = $this->fileModel->getById($id);
        $allowedExtensions = ['pdf', 'pptx', 'ppt', 'xls', 'xlsx', 'jpg', 'jpeg', 'png', 'gif', 'doc', 'docx'];
        
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if (in_array($extension, $allowedExtensions)) {
            return "../uploads/user_" . $path['user_id'] . "/" . $path['path'];
        }
        
        return null;
    }

    public function updateProject($id,$projName, $projDesc, $projLang, $projImg, $projDate, $projPath){
        $this->fileModel->updateProject($id,$projName, $projDesc, $projLang, $projImg, $projDate, $projPath);
    }
}
