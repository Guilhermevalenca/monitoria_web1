<?php function todo_create() { ?>

    <form id="form_create" action="/create" method="POST">
        <fieldset style="width: 300px;">
            <legend>Criar tarefá</legend>
            <div>
                <label>titulo:</label>
                <input name="title" placeholder="Escreva o titulo">
            </div>
            <div>
                <label>Descrição:</label> <br>
                <textarea name="description" placeholder="Descreva a tarefá" style="width: 227px; height: 62px;"></textarea>
            </div>
            <div style="display: flex; justify-content: end; margin-top: 30px">
                <button id="cancel">cancelar</button>
                <button>criar</button>
            </div>
        </fieldset>
    </form>
    <script>
        const cancel = document.querySelector('#cancel');
        const form = document.querySelector('#form_create');

        cancel.addEventListener('click', () => {

            form.addEventListener('submit', event => {
                event.preventDefault();
            });

            window.location.href = '/';

        })
    </script>

<?php } ?>