<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// phpinfo();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../boot/whoops.php';
require_once __DIR__ . '/../boot/dotenv.php';
require_once __DIR__ . '/../database/init.php';
require_once __DIR__ . '/../app/routes.php';
