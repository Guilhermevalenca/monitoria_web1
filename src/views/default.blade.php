<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/node_modules/sweetalert2/dist/sweetalert2.css">
    <!-- Opcional: Se você quiser usar ícones do Bootstrap, inclua também o CSS do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>@yield('title')</title>
</head>
<body>

@yield('body')

<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="/node_modules/sweetalert2/dist/sweetalert2.js"></script>
@if(array_key_exists('expired_token', $_SESSION))

    <script>

        Swal.fire({
            title: 'Sessão expirada',
            text: 'É necessário realizar novamente o login',
            icon: 'warning'
        })

    </script>
<?php

unset($_SESSION['expired_token']);

?>
@endif
</body>
</html>