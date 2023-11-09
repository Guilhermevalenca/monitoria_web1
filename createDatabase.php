<?php

require 'Database.php';

$db = new Database();

$query = file_get_contents('banco.sql');


$result = $db->createDatabase($query);

var_dump($result);