<?php
require '../Todo.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'status' => $_POST['status'],
        'id' => $_GET['id']
    ];
    updateTodo($dados);
    exit();
}

$dados = searchById($_GET['id']);
$dados = $dados[0];
?>
<fieldset>
    <legend>Editar</legend>
    <form method="post">
        <fieldset>
            <legend>Dados da tarefá</legend>
            <div>
                <label>Titulo:</label>
                <input id="title" name="title" placeholder="Escreva o titulo da tarefa" value="<?= $dados['title'] ?>">
            </div>
            <div>
                <label>Descrição:</label>
                <input id="description" name="description" placeholder="Escreva a descrição da tarefa" value="<?= $dados['description'] ?>">
            </div>
            <div>
                <label>Status</label>
                <select name="status">
                    <option <?php echo $dados['status'] === 'Feito' ? 'selected': '' ?> value="Feito">Feito</option>

                    <option <?php echo $dados['status'] === 'Em andamento' ? 'selected': '' ?> value="Em andamento">Tarefá em andamento</option>

                    <option <?php echo $dados['status'] === 'Não feito' ? 'selected': '' ?> value="Não feito">Sem progresso</option>
                </select>
            </div>
            <button>atualizar tarefá</button>
        </fieldset>
    </form>
</fieldset>