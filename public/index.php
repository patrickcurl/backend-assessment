<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// setup composer and dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// setup pretty error handling.
require_once __DIR__ . '/../boot/whoops.php';

// Setup env vars so we don't send sensitive data to github.
require_once __DIR__ . '/../boot/dotenv.php';

// make db available globally.
require_once __DIR__ . '/../database/init.php';

// include the routes so we can point everything at index.php and the routes will be handled properly.
require_once __DIR__ . '/../app/routes.php';
