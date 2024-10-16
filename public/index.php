<?php
session_start();
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/FileController.php';

$authController = new AuthController();
$fileController = new FileController();

$route = $_GET['route'] ?? 'home';
if (isset($_SESSION['user_id'])) {
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
    case 'dash':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $brightness = max(0, min(255, intval($_POST['brightness'])));
            $power = $_POST['power'];

            // Fonction pour mettre à jour les fichiers
            function updateFiles($brightness, $red, $green, $blue)
            {
                file_put_contents('brightness.txt', $brightness);
                file_put_contents('led_state.txt', "$red,$green,$blue");
            }

            if ($power === 'on') {
                $red = max(0, min(255, intval($_POST['red'])));
                $green = max(0, min(255, intval($_POST['green'])));
                $blue = max(0, min(255, intval($_POST['blue'])));
            } else {
                $red = $green = $blue = 0;
            }
            updateFiles($brightness, $red, $green, $blue);
        }
        require_once __DIR__ . '/../app/views/index.php';
        exit;
    case 'login':
        /* $authController->getVisitor();    */            
        $usernames = $authController->getUsernames();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            if ($authController->login($username, $password)) {
                header('Location: ' . BASE_URL . '/index.php?route=dash');
                exit;
            } else {
                $error = "Mauvais utilisateur ou mot de passe";
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
        $newFileName = isset($_POST['editFileName']) ? $_POST['editFileName'] : '';
        $fileId = isset($_POST['editFileid']) ? $_POST['editFileid'] : '';
        $parentId = $_GET['parent_id'] ?? null;
        $fileController->index($parentId, $fileId, $newFileName);
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
        if ($userselect != null) {
            $infoUser = $authController->getinfoUser($userselect);
        } else {
            $infoUser = "";
        }
        $fileController->adminfiles($parentId, $userselect, $users, $infoUser);

        break;

    case 'addUserAdmin':
        $uUsername = $_POST['addUserAdminName'];
        $uPassword = $_POST['addUserAdminPass'];
        $authController->addUserAdmin($uUsername, $uPassword);
        header('Location: ' . BASE_URL . '/index.php?route=admin');
        break;
    case 'delUserAdmin':
        $delUser = $_GET['uid'];
        $authController->delUserAdmin($delUser);
        header('Location: ' . BASE_URL . '/index.php?route=admin');
        break;

    case 'UpdatePassword':
        $newpass = $_POST['npass'];
        $lastpassword = $_POST['cpass'];
        $authController->updatePassword($newpass, $lastpassword, $_SESSION['username']);

        break;

    case 'editproject':
        $id= $_POST['Projid'];
        $projName = $_POST['ProjNom'];
        $projDesc = $_POST['ProjDesc'];
        $projLang = $_POST['ProjLang'];
        $projImg = $_POST['ProjImg'];
        $projDate = $_POST['ProjDate'];
        $projPath = $_POST['ProjChemin'];
        $fileController->updateProject($id,$projName, $projDesc, $projLang, $projImg, $projDate, $projPath);
        header('Location: ' . BASE_URL . '/index.php?route=admin');
        break;
    case 'editusers':
        $authController->editUserPage();
        break;


    default:
        header('Location: ' . BASE_URL . '/index.php?route=login');
}
function percentsize()
{
    $chemin = "/"; // Ou "C:/" sur Windows
    $total = disk_total_space($chemin);
    $libre = disk_free_space($chemin);
    $utilise = $total - $libre;
    $pourcentage_utilise = ($utilise / $total) * 100;

    // Fonction pour formater les octets en unités lisibles
    return round($pourcentage_utilise, 2);
}

function freesize()
{
    $libre = disk_free_space("./");

    function formatBytes($bytes, $precision = 1)
    {
        $units = array('o', 'Ko', 'Mo', 'Go', 'To');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    return formatBytes($libre);
}