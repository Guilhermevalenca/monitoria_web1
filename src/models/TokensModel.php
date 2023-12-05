<?php

namespace models;

use models\Model;

class TokensModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tokens';
    }

    public function add($data)
    {
        $sql = 'INSERT INTO tokens (token, user_id, abilities, ip, life_time) VALUES (:token, :user_id, :abilities, :ip, :life_time)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':token', $data['token']);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':abilities', $data['abilities']);
        $stmt->bindParam(':ip', $data['ip']);
        $stmt->bindParam(':life_time', $data['life_time']);
        $stmt->execute();
        return ['success' => true, 'token_id' => $this->findId($data['token'])];
    }
    private function findId($token)
    {
        $sql = "SELECT id from tokens WHERE token = :token";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function searcById($id)
    {
        $sql = "SELECT * FROM tokens WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}