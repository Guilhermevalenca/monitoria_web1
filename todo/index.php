<?php
require 'init.php';

$todo = new Todo();

$data = $todo->select();

?>

<button onclick="pageCreateTodo()">criar tarefa</button>

<table border="1">
    <thead>
        <tr>
            <th>Titulo da tarefa</th>
            <th>Descrição</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value): ?>
            <tr>
                <th><?= $value['title'] ?></th>
                <th><?= $value['description'] ?></th>
                <th><?= $value['status'] ?></th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>