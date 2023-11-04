<?php function listTodo($todos) { ?>
    <fieldset>
        <div id="editTodo"></div>
        <legend>Exibindo dados:</legend>
        <table border="1">
            <thead>
            <tr>
                <th>titulo</th>
                <th>descrição</th>
                <th>status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($todos as $todo): ?>
                <tr>
                    <td><?= $todo['title'] ?></td>
                    <td><?= $todo['description'] ?></td>
                    <td><?= $todo['status'] ?></td>
                    <td>
                        <a href="page/editTodo.php?id=<?= $todo['id'] ?>">editar</a>
                    </td>
                    <td>
                        <a href="page/deleteTodo.php?id=<?= $todo['id'] ?>">deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <button id="buttonExecute" onclick="execute()">execute</button>
        <div id="showMessage"></div>
    </fieldset>
    <?php
    $scripts = [
        '/Todo/js/index.js'
    ];
    echo scripts($scripts);
    ?>
<?php } ?>
