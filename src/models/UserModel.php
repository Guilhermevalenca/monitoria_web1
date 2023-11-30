<?php

namespace models;

use models\Model;

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
    }
    public function add($data)
    {
        try {
            $sql = 'INSERT INTO ' . $this->table . ' (name, email, password) VALUES (:name, :email, :password)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->execute();
            return ['success' => true];
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
    public function verifyExist($email)
    {
        try {
            $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}