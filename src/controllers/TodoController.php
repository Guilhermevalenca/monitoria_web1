<?php

namespace controllers;

use controllers\Controller;
use http\Header;
use models\TodoModel;

class TodoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new TodoModel();
    }

    public function index()
    {
        $data = $this->model->select();
        echo $this->blade->render('todo/home', [
            'data' => $data
        ]);
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