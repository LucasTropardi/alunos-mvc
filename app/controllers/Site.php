<?php

namespace app\controllers;

use app\models\Crud;

class Site extends Crud
{
    //Parte referente ao crud de escolas
    public function home()
    {
        require_once __DIR__ . "/../views/home.php";
    }

    public function cadastro_escola()
    {
        require_once __DIR__ . '/../views/cadastro_escola.php';
        $cadastro_escola = $this->create_escola();
    }

    public function lista_escola()
    {
        $consulta_escola = $this->read_escola();
        require_once __DIR__ . '/../views/lista_escola.php';
    }

    public function edita_escola()
    {
        $editarFormEscola = $this->editFormEscola();
        require_once __DIR__ . '/../views/edita_escola.php';
    }

    public function alterarEscola()
    {
        $alterarEscola = $this->update_escola();
        header("Location:?router=Site/lista_escola");
    }

    public function confirmaDeleteEscola()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/confirmaDeleteEscola.php';
    }

    public function deletarEscola() 
    {
        $deletarEscola = $this->delete_escola();
        header("Location:?router=Site/lista_escola");
    }
    //Parte referente ao crud de salas
    public function cadastro_sala()
    {
        $nomesEscolas = $this->getNomesEscolas();
        require_once __DIR__ . '/../views/cadastro_sala.php';
    }

    public function lista_sala()
    {
        require_once __DIR__ . '/../views/lista_sala.php';
    }

    
}