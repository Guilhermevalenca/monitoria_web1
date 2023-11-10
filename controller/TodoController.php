<?php
class TodoController extends Controller
{
    private $model;
    public function __construct()
    {
        parent::__construct();
        $this->directory = 'todo';
        $this->model = new Todo();
    }
    public function index()
    {
        $this->render('home');
        $data = $this->model->select();

        return todo_home($data);
    }
    public function create()
    {
        $this->render('create');
        return todo_create();
    }
    public function store()
    {
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description']
        ];
        $this->model->add($data);
        header('Location: /');
    }
}