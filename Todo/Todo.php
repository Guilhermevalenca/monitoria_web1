<?php

$host = 'localhost';
$port = '3306';
$username = 'gui';
$password = 'rock1109';
$database = 'monitoria';

$conn = new PDO("mysql:host=$host;port=$$port;dbname=$database", $username, $password);

function selectAll() {
    global $conn;
    $sql = 'SELECT * FROM todo';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function searchById($id) {
    global $conn;
    $sql = 'SELECT * FROM todo WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addTodo($title, $description) {

    global $conn;
    $sql = "INSERT INTO todo (title, description) values( :title, :description)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description',$description);
    $stmt->execute();
    header('Location: index.php');
}

function updateTodo($dados){

    global $conn;
    $sql = 'UPDATE todo SET title = :title, description = :description, status = :status WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $dados['title']);
    $stmt->bindParam(':description',$dados['description']);
    $stmt->bindParam(':status',$dados['status']);
    $stmt->bindParam(':id', $dados['id']);
    $stmt->execute();
    header('Location: /Todo/');

}