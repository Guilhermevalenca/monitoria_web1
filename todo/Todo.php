<?php

class Todo extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->connection();
        $this->table = 'todo';
    }
    public function add($data)
    {
        $sql = 'INSERT INTO ' . $this->table. '(title, description)' . ' VALUES(:title, :description)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->execute();
    }
}