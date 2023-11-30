<?php

namespace controllers;

use controllers\Controller;
use http\Header;
use models\TodoModel;

class TodoController extends Controller
{
    private $auth;
    public function __construct()
    {
        parent::__construct();
        $this->model = new TodoModel();
        $this->auth = new AuthenticationController();
    }

    public function index()
    {
        if($this->auth->verifyAuthenticated()) {
            $data = $this->model->select();
            echo $this->blade->render('todo/home', [
                'data' => $data
            ]);
        } else {
            \Flight::redirect('/');
        }

    }
    public function create()
    {
        echo $this->blade->render('todo/create');
    }
    public function store()
    {
        $data = $_POST;
        $this->model->add($data);
        \Flight::redirect('/todo');
    }
    public function destroy($id)
    {
        $result = $this->model->delete($id);
        echo json_encode($result);
    }
}