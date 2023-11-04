<?php function createTodo(){ ?>
    <form action="/Todo/" method="post">
        <fieldset>
            <legend>Dados da tarefá</legend>
            <div>
                <label>Titulo:</label>
                <input id="title" name="title" placeholder="Escreva o titulo da tarefa">
            </div>
            <div>
                <label>Descrição:</label>
                <input id="description" name="description" placeholder="Escreva a descrição da tarefa">
            </div>
            <button>criar tarefá</button>
        </fieldset>
    </form>
<?php } ?>
