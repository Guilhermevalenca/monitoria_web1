<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

require 'controllers/Controller.php';
require 'controllers/TodoController.php';
require 'models/Model.php';
require 'models/Todo.php';


$url = $_SERVER['REQUEST_URI'];
$url = explode('/',$url);
function separating($url) {
    $response = [];
    foreach ($url as $value) {
        array_push($response, explode('?', $value));
    }
    return $response;
}

$url = separating($url);

if($url[1][0] === 'todo') {
    require 'routes/todos/index.php';
}
