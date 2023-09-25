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
        header("Location:?router=Site/lista_escola");
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
        $cadastro_sala = $this->create_sala();
        header("Location:?router=Site/lista_sala");
    }

    public function lista_sala()
    {
        $consulta_sala = $this->read_sala();
        require_once __DIR__ . '/../views/lista_sala.php';
    }

    public function edita_sala()
    {
        $nomesEscolas = $this->getNomesEscolas();
        $editarFormSala = $this->editFormSala();
        require_once __DIR__ . '/../views/edita_sala.php';
    }    

    public function alterarSala()
    {
        $alterarSala = $this->update_sala();
        header("Location:?router=Site/lista_sala");
    }

    public function confirmaDeleteSala()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/confirmaDeleteSala.php';
    }

    public function deletarSala()
    {
        $deletarSala = $this->delete_sala();
        header("Location:?router=Site/lista_sala");
    }
    //a partir daqui crud alunos
    public function cadastro_aluno()
    {
        $nomesSalas = $this->getNomesSalas();
        require_once __DIR__ . '/../views/cadastro_aluno.php';
        $cadastro_aluno = $this->create_aluno();
        header("Location:?router=Site/lista_aluno");
    }

    public function lista_aluno()
    {
        $consulta_aluno = $this->read_aluno();
        require_once __DIR__ . '/../views/lista_aluno.php';
    }

    public function edita_aluno()
    {
        $nomesSalas = $this->getNomesSalas();
        $editarFormAluno = $this->editFormAluno();
        require_once __DIR__ . '/../views/edita_aluno.php';
    }

    public function alterarAluno()
    {
        $alterarAluno = $this->update_aluno();
        header("Location:?router=Site/lista_aluno");
    }

    public function confirmaDeleteAluno()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/confirmaDeleteAluno.php';
    }

    public function deletarAluno()
    {
        $deletarAluno = $this->delete_aluno();
        header("Location:?router=Site/lista_aluno");
    }
    //fim do crud aluno, a partir daqui inicia crud ocorrencias
    public function cadastro_ocorrencia()
    {
        require_once __DIR__ . '/../views/cadastro_ocorrencia.php';
        $cadastro_ocorrencia = $this->create_ocorrencia();
        header("Location:?router=Site/lista_aluno");
    }

    public function lista_ocorrencia()
    {
        $consulta_ocorrencia = $this->read_ocorrencia();
        require_once __DIR__ . '/../views/lista_ocorrencia.php';
    }

    public function edita_ocorrencia()
    {
        $editarFormOcorrencia = $this->editFormOcorrencia();
        require_once __DIR__ . '/../views/edita_ocorrencia.php';
    }

    public function alterarOcorrencia()
    {
        $alterarOcorrencia = $this->update_ocorrencia();
        header("Location:?router=Site/lista_ocorrencia");
    }

    public function confirmaDeleteOcorrencia()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/confirmaDeleteOcorrencia.php';
    }

    public function deletarOcorrencia()
    {
        $deletarOcorrencia = $this->delete_ocorrencia();
        header("Location:?router=Site/lista_ocorrencia");
    }
    //fim do crud de ocorrencias, a partir daqui crud para chamadas
    public function cadastro_chamada()
    {
        $id_sala = filter_input(INPUT_GET, 'id_sala', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $alunos = $this->getAlunosPorSala();
        $periodoManhaChecked = true;
        $periodoTardeChecked = false;
        $periodoNoiteChecked = false;
        $alunos_presentes = isset($_POST['presenca']) ? $_POST['presenca'] : [];
        require_once __DIR__ . '/../views/cadastro_chamada.php';
        $cadastro_chamada = $this->create_chamada();
        header("Location:?router=Site/lista_sala/");

    }

    public function lista_chamada()
    {
        $consulta_chamada = $this->read_chamada();
        require_once __DIR__ . '/../views/lista_chamada.php';
    }

    public function edita_chamada()
    {
        $editarFormChamada = $this->editFormChamada();
        require_once __DIR__ . '/../views/edita_chamada.php';
    }

    public function alterarChamada()
    {
        $alterarChamada = $this->update_chamada();
        header("Location:?router=Site/lista_chamada");
    }

    public function confirmaDeleteChamada()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/confirmaDeleteChamada.php';
    }

    public function deletarChamada()
    {
        $deletarChamada = $this->delete_chamada();
        header("Location:?router=Site/lista_chamada");
    }
}