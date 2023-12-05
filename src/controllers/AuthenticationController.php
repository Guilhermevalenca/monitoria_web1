<?php

namespace controllers;

use controllers\Controller;
use models\UserModel;

class AuthenticationController extends Controller
{

    private $token;
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
        $this->token = new TokensController();
    }
    public function login()
    {
        echo $this->blade->render('user/login');
    }
    public function auth()
    {
        $result = $this->token->authenticator($_POST);
        if($result) {

            $_SESSION['user'] = [
                'id' => $result[0]['id'],
                'name' => $result[0]['name'],
                'email' => $result[0]['email'],
                'role' => $result[0]['role']
            ];

            if($this->token->createToken()) {
                \Flight::redirect('/todo');
            }

        }
    }
}