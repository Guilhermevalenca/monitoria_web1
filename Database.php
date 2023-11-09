<?php
class Database
{
    private $host = 'localhost';
    private $port = '3306';
    private $username = 'gui';
    private $password = 'rock1109';
    private $dbname = 'monitoria';
    protected $conn;
    public $table;

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname;
        $this->conn = new PDO($dsn, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function createDatabase($query)
    {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port;
        $this->conn = new PDO($dsn, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    public function select()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}