<?php

class Database
{
    private $host = 'localhost';
    private $port = '3306';
    private $username = 'gui';
    private $password = 'rock1109';
    private $database = 'monitoria';
    protected $conn;
    public function __constructor()
    {
        $this->setConnection();
    }
    public function setConnection()
    {
        $this->conn = new PDO("mysql:host=$this->host;port=$$this->port;dbname=$this->database", $this->username, $this->password);
    }
}