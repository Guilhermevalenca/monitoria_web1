<?php

class Model
{
    protected $conn;
    public $table;
    public function __construct()
    {
        $this->connection();
    }
    public function connection()
    {
        $this->conn = new \PDO('mysql:host=localhost;port=port;dbname=monitoria', 'gui', 'rock1109');
    }
    public function select()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function selectById($id)
    {
        $sql = 'SELECT * FROM ' . $this->table . ' where id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}