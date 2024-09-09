<?php
session_start();
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/FileController.php';

$authController = new AuthController();
$fileController = new FileController();

$route = $_GET['route'] ?? 'home';
if(isset($_SESSION['user_id'])){
    $_SESSION['info_user'] = $authController->getinfoUser($_SESSION['user_id']);
}
switch ($route) {
    case 'home':
        if ($authController->isLoggedIn()) {
            header('Location: ' . BASE_URL . '/index.php?route=files');
        } else {
            header('Location: ' . BASE_URL . '/index.php?route=login');
        }
        exit;
    case 'dash' :
        require_once __DIR__ . '/../app/views/index.php';
        exit;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            if ($authController->login($username, $password)) {
                header('Location: ' . BASE_URL . '/index.php?route=files');
                exit;
            } else {
                $error = "Invalid email or password.";
            }
        }
        require_once __DIR__ . '/../app/views/login.php';
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            if ($authController->register($username, $email, $password)) {
                header('Location: ' . BASE_URL . '/index.php?route=login');
                exit;
            } else {
                $error = "Registration failed.";
            }
        }
        require_once __DIR__ . '/../app/views/register.php';
        break;

    case 'logout':
        $authController->logout();
        header('Location: ' . BASE_URL . '/index.php?route=login');
        exit;

    case 'files':
        $parentId = $_GET['parent_id'] ?? null;
        $fileController->index($parentId);
        break;

    case 'create_directory':
        $fileController->createDirectory();
        break;

    case 'upload':
        $fileController->upload();
        break;

    case 'download':
        $fileId = $_GET['id'] ?? null;
        if ($fileId) {
            $fileController->download($fileId);
        }
        break;

    case 'delete':
        $fileId = $_GET['id'] ?? null;
        if ($fileId) {
            $fileController->delete($fileId);
        }
        break;
    case 'project':
        $fileController->gotoproject();
        break;
    
    case 'admin':
        $userselect = $_GET['userselect'] ?? null;
        $parentId = $_GET['parent_id'] ?? null;
        $users = $authController->getAllUser();
        if ($userselect != null){
            $infoUser = $authController->getinfoUser($userselect);
        }
        $fileController->adminfiles($parentId, $userselect, $users, $infoUser);

        break;

    case 'addUserAdmin':
        /* a faire */
        break;
    default:

        header('Location: ' . BASE_URL . '/index.php?route=login');

        /*     // Page 404
        header("HTTP/1.0 404 Not Found");
        require_once __DIR__ . '/../app/views/404.php';
        break; */
}
