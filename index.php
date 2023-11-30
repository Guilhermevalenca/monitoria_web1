<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

session_start();

use controllers\Controller;

Flight::route('/', function () {
    $controller = new Controller();
    echo $controller->blade->render('welcome');
});

require __DIR__ . '/routes/routes.php';

Flight::start();