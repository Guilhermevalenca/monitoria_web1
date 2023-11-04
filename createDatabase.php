<?php

$host = 'localhost';
$port = '3306';
$username = 'gui';
$password = 'rock1109';

$sql = file_get_contents('banco.sql');

$pdo = new PDO("mysql:host=$host;port=$port", $username, $password);

$result = $pdo->exec($sql);
var_dump($result);
