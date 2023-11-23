<?php


class TodoController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Todo();
    }

    public function index()
    {
        return $this->model->select();
    }

    public function show($id)
    {
        return $this->model->selectById($id);
    }

    public function add($data)
    {
        if(is_null($data['title']) || is_null($data['description'])) {
            return ['error' => 'Titulo ou descrição não podem ser nulos'];
        }
        return $this->model->add($data);
    }

    public function update($data)
    {
        return $this->model->update($data);
    }

    public function update_status($id)
    {
        return $this->model->update_status($id);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

}