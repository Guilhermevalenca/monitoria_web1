<?php

use controllers\UserController;
use controllers\AuthenticationController;

Flight::route('GET /register', [new UserController(), 'create']);
Flight::route('POST /register', [new UserController(), 'store']);

Flight::route('GET /login', [new AuthenticationController(), 'login']);
Flight::route('POST /login', [new AuthenticationController(), 'auth']);