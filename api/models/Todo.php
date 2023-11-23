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
        try {
            $sql = 'INSERT INTO ' . $this->table . '(title, description)' . ' VALUES(:title, :description)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->execute();
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
    public function update($data)
    {
        try {
            $sql = 'UPDATE todo SET title = :title, description = :description WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':id', $data['id']);
            $stmt->execute();
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
    public function update_status($id)
    {
        $this->conn->beginTransaction();
        try {
            $sql = 'SELECT status FROM todo WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $todo = $stmt->fetch(\PDO::FETCH_ASSOC);

            $sql = 'UPDATE todo SET status = :status WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $newStatus = $todo['status'] === 0 ? 1 : 0;
            $stmt->bindParam(':status', $newStatus);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $this->conn->commit();
            return ['success' => true];
        } catch (\PDOException $e) {
            $this->conn->rollBack();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
