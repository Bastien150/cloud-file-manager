<?php
define('BASE_URL', 'http://localhost/public');
define('UPLOAD_DIR', __DIR__ . '/../../uploads/');

// Configuration de la base de données
define('DB_HOST', '192.168.1.250');
define('DB_NAME', 'cloud');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);