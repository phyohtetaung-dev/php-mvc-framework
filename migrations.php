<?php

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'DB_DSN' => $_ENV['DB_DSN'],
        'DB_USER' => $_ENV['DB_USER'],
        'DB_PASSWORD' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();
