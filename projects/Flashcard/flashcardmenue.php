<?php


session_start();
require_once('./model.php');
$conn = connecte();

if (isset($_POST['addnewtheme'])) {
    $newtheme = $_POST['addnewtheme'];

    if ($conn) {
        $stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS `$newtheme` (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            front VARCHAR(255) NOT NULL,
            back VARCHAR(255) NOT NULL
        )");
        $stmt->execute();
    }
    header('Location: index.php');
    exit;
}

if (isset($_POST['theme'])) {
    $_SESSION['bddactuelle'] = $_POST['themeac'];
    echo $_POST['themeac'];

    header('Location: index.php');
    exit;
}

if (isset($_POST['deltheme'])) {
    $theme = $_POST['themeac'];

    if ($conn) {
        $stmt = $conn->prepare("DROP TABLE IF EXISTS `$theme`");
        $stmt->execute();
    }

    header('Location: menu.php');
    exit;
}