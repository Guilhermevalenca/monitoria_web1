@extends('default')

@section('title')
    todo
@endsection

@section('body')

    <h1 class="text-center my-5">To-dos</h1>
    <div class="d-flex justify-content-center">
        <table class="table border-dark w-75">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Description</th>
                <th>Status</th>
                <th>options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $value)

                <tr>
                    <td>{{ $value['title'] }}</td>
                    <td>{{ $value['description'] }}</td>
                    <td>
                        <button class="btn btn-success">{{ $value['status'] ? 'Concluido' : 'Não concluido' }}</button>
                    </td>
                    <td>
                        <button class="btn btn-primary">Atualizar</button>
                        <button class="btn btn-danger" onclick="del({{ $value['id'] }})">Deletar</button>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end m-5">
        <button onclick="window.location.href = '/todo/create'">criar tarefa</button>
    </div>

    <script>
        function del(id) {
            fetch(`/todo/${id}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        window.location.href = '/todo';
                    } else {
                        alert('Não foi possível deletar');
                    }
                })
        }
    </script>


@endsection