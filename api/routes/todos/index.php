<?php

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if($_SERVER['REQUEST_METHOD'] === 'GET') {

    $todo = new TodoController();

    if($url[1][1]) {
        $response = $todo->show($_GET['id']);
    } else {
        $response = $todo->index();
    }
    echo json_encode($response);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $todo = new TodoController();
    $response = $todo->add($data);
    echo json_encode($response);

}

if($_SERVER['REQUEST_METHOD'] === 'PUT') {

    $todo = new TodoController();
    $response = $todo->update($data);
    echo json_encode($response);

}

if($_SERVER['REQUEST_METHOD'] === 'PATCH') {

    $todo = new TodoController();
    $response = $todo->update_status($_GET['id']);
    echo json_encode($response);

}

if($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $todo = new TodoController();
    $response = $todo->delete($_GET['id']);
    echo json_encode($response);

}