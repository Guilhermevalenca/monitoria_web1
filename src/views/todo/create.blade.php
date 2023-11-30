@extends('default')

@section('body')

    <form class="d-flex justify-content-center" action="/todo/create" method="post">
        <fieldset>
            <legend>Dados da tarefa</legend>
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description">
            </div>
            <button class="btn btn-primary">Criar tarefa</button>
        </fieldset>
    </form>

@endsection