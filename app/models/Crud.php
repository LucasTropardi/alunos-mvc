<?php

namespace app\models;

class Crud extends Connection
{
    public function create_escola()
    {
        $nome = filter_input(INPUT_POST, 'nome_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade = filter_input(INPUT_POST, 'cidade_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $endereco = filter_input(INPUT_POST, 'endereco_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "INSERT INTO escolas values (default, :nome, :cidade, :endereco)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->execute();
        return $stmt;
    }

    public function read_escola()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM escolas ORDER BY nome_escola";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update_escola()
    {
        $nome = filter_input(INPUT_POST, 'nome_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade = filter_input(INPUT_POST, 'cidade_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $endereco = filter_input(INPUT_POST, 'endereco_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, 'id_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "update escolas set nome_escola = :nome, cidade_escola = :cidade, endereco_escola = :endereco where id_escola = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function delete_escola()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "delete from escolas where id_escola = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function editFormEscola()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT * FROM escolas WHERE id_escola = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getNomesEscolas()
    {
        $conn = $this->connect();
        $sql = "SELECT escolas.id_escola, escolas.nome_escola, escolas.* FROM escolas";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function create_sala()
    {
        
    }
}