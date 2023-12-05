<?php

namespace controllers;

use controllers\Controller;
use models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }
    public function create()
    {
        echo $this->blade->render('user/create');
    }
    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $this->crypt($_POST['password'])
        ];
        $result = $this->model->add($data);
        if($result['success']) {
            \Flight::redirect('/login');
        } else {
            echo 'deu errado';
        }
    }
}