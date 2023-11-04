<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bem vindo!!!</h1>
    <div id="app"></div>
    <script>
        fetch('/Todo/index.php')
            .then(response => response.text())
            .then(html => {
                document.querySelector('#app').innerHTML = html;
            })
    </script>
</body>
</html>