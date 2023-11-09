<?php

require 'init.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') { // pedir dados



}

if($_SERVER['REQUEST_METHOD'] === 'POST') { //inserir/criar dados

    $todo = new Todo();
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];
    $todo->add($data);
    echo json_encode(['success' => true]);

}

if($_SERVER['REQUEST_METHOD'] === 'PUT') { // atualizar muitos dados



}

if($_SERVER['REQUEST_METHOD'] === 'PATCH') { //atualizar um unico dado



}

if($_SERVER['REQUEST_METHOD'] === 'DELETE') { //apagar/deletar dado



}