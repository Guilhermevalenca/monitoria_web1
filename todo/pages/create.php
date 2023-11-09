<button onclick="pageTodo()">cancelar</button>

<form id="formCreate" method="POST" action="/todo/actions.php">
    <fieldset>
        <legend>Criar tarefa</legend>

        <div>
            <label>Titulo</label>
            <input id="title" name="title">
        </div>
        <div>
            <label>descrição</label> <br>
            <textarea id="description" name="description" style="height: 64px; width: 221px;"></textarea>
        </div>
        <button type="submit">criar tarefa</button>
    </fieldset>
</form>