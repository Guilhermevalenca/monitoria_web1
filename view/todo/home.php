<?php function todo_home($data){ ?>
    <button onclick="window.location.href = '/create'">Criar nova tarefá</button>
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
                    <td><?= $value['title'] ?></td>
                    <td><?= $value['description'] ?></td>
                    <td><?= $value['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php } ?>