@extends('default')

@section('body')

    <form class="d-flex justify-content-center" action="/register" method="POST">
        <fieldset>
            <legend>Registrar usuário</legend>
            <div class="form-group">
                <label for="exampleInputName">Name:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>

@endsection