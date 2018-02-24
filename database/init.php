<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
// $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);
