<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// phpinfo();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/whoops.php';
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
require_once __DIR__ . '/../app/db.php';
require_once __DIR__ . '/../app/routes.php';
