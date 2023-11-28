@extends('default')

@section('body')
    <form action="/todo/create" method="post">
        <fieldset>
            <legend>Dados da tarefa</legend>
            <div>
                <label>Titulo</label>
                <input name="title">
            </div>
            <div>
                <label>Descrição</label>
                <input name="description">
            </div>
            <button>Criar tarefa</button>
        </fieldset>
    </form>
@endsection