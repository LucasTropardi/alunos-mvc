<?php

namespace app\models;

abstract class Connection
{
    private $dbname = 'mysql:host=localhost;dbname=alunos';
    private $user = 'root';
    private $pass = 'senh@123';

    protected function connect()
    {
        try {
            $conn = new \PDO($this->dbname, $this->user, $this->pass);
            $conn->exec("set names utf8");
            return $conn;
        } catch (\PDOException $e) {
            echo "erro: " . $e->getMessage();
        }
    }
}