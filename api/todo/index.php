<?php
require '../cors.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {

    require 'getTodos.php';

}