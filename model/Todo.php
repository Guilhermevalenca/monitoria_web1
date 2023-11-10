<?php

class Todo extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'todo';
    }
    public function add($data)
    {
        $sql = 'INSERT INTO ' . $this->table . '(title, description)' . ' VALUES(:title, :description)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->execute();
    }
}