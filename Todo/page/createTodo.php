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
                <textarea id="description" name="description" placeholder="Escreva a descrição da tarefa"></textarea>
            </div>
            <button>criar tarefá</button>
        </fieldset>
    </form>
<?php } ?>
