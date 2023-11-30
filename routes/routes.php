<?php

use controllers\TodoController;

Flight::route('GET /todo', [new TodoController(), 'index']);

Flight::route('GET /todo/create', [new TodoController(), 'create']);
Flight::route('POST /todo/create', [new TodoController(), 'store']);

Flight::route('DELETE /todo/@id', [new TodoController(), 'destroy']);

require __DIR__ . '/UserRoutes.php';

