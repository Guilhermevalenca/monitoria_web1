<?php
require 'Todo.php';
require 'page/init.php';
require 'layout/init.php';
require 'imports/init.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo head();
    echo createTodo();
    $todos = selectAll();
    echo listTodo($todos);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    addTodo($_POST['title'], $_POST['description']);
}
