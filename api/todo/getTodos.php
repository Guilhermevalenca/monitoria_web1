<?php
try {
    $conn = new PDO('mysql:host=localhost;port=3006;dbname=monitoria', 'gui', 'rock1109');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM todo';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (PDOException $e) {
// Tratamento de erro
    echo json_encode(['error' => 'Erro de banco de dados: ' . $e->getMessage()]);
}