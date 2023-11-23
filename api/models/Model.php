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
        $this->conn = new \PDO('mysql:host=localhost;port=3306;dbname=monitoria', 'gui', 'rock1109');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        try {
            $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}