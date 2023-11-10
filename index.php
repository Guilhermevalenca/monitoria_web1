<?php

require 'controller/init.php';

$todo = new TodoController();

$url = $_SERVER['REQUEST_URI'];

if($url === '/') {

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo $todo->index();
    }

}

if($url === '/create'  || $url === '/create/') {

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo $todo->create();
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $todo->store();
    }

}