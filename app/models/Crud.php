<?php

namespace app\models;

class Crud extends Connection
{
    //crud para escolas
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
    //fim do crud escolas, a partir daqui crud salas
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
        $id_escola = filter_input(INPUT_POST,'id_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_sala = filter_input(INPUT_POST, 'nome_sala', FILTER_SANITIZE_SPECIAL_CHARS);
        $serie = filter_input(INPUT_POST, 'serie', FILTER_SANITIZE_NUMBER_INT);
        $turma = strtoupper(filter_input(INPUT_POST, 'turma', FILTER_SANITIZE_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "INSERT INTO salas values (default, :id_escola, :nome_sala, :serie, :turma)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_escola', $id_escola);
        $stmt->bindParam(':nome_sala', $nome_sala);
        $stmt->bindParam(':serie', $serie);
        $stmt->bindParam(':turma', $turma);
        $stmt->execute();
        return $stmt;
    }

    public function read_sala()
    {
        $conn = $this->connect();
        $sql = "SELECT a.id_sala, a.id_escola, b.nome_escola, a.nome_sala, a.serie, a.turma 
        FROM salas a INNER JOIN escolas b ON b.id_escola = a.id_escola ORDER BY a.id_escola, a.nome_sala";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update_sala()
    {
        $id_escola = filter_input(INPUT_POST,'id_escola', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_sala = filter_input(INPUT_POST, 'nome_sala', FILTER_SANITIZE_SPECIAL_CHARS);
        $serie = filter_input(INPUT_POST, 'serie', FILTER_SANITIZE_NUMBER_INT);
        $turma = strtoupper(filter_input(INPUT_POST, 'turma', FILTER_SANITIZE_SPECIAL_CHARS));
        $id_sala = filter_input(INPUT_POST, 'id_sala', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "UPDATE salas SET id_escola = :id_escola, nome_sala = :nome_sala, serie = :serie, turma = :turma where id_sala = :id_sala";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_escola', $id_escola);
        $stmt->bindParam(':nome_sala', $nome_sala);
        $stmt->bindParam(':serie', $serie);
        $stmt->bindParam(':turma', $turma);
        $stmt->bindParam(':id_sala', $id_sala);
        $stmt->execute();
        return $stmt;
    }

    public function delete_sala()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "delete from salas where id_sala = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function editFormSala()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT a.id_sala, a.id_escola, b.nome_escola, a.nome_sala, a.serie, a.turma 
        FROM salas a INNER JOIN escolas b ON b.id_escola = a.id_escola WHERE id_sala = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    //fim do crud salas, a partir daqui crud alunos
    public function getNomesSalas()
    {
        $conn = $this->connect();
        $sql = "SELECT salas.id_sala, salas.nome_sala, salas.* FROM salas";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function create_aluno()
    {
        $id_sala = filter_input(INPUT_POST,'id_sala', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_aluno = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $numero_aluno = filter_input(INPUT_POST, 'numero_aluno', FILTER_SANITIZE_NUMBER_INT);
        $endereco_aluno = filter_input(INPUT_POST, 'endereco_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade_aluno = filter_input(INPUT_POST, 'cidade_aluno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $responsavel_aluno = filter_input(INPUT_POST, 'responsavel_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "INSERT INTO alunos values (default, :id_sala, :nome_aluno, :numero_aluno, :endereco_aluno, :cidade_aluno, :responsavel_aluno, :contato)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_sala', $id_sala);
        $stmt->bindParam(':nome_aluno', $nome_aluno);
        $stmt->bindParam(':numero_aluno', $numero_aluno);
        $stmt->bindParam(':endereco_aluno', $endereco_aluno);
        $stmt->bindParam(':cidade_aluno', $cidade_aluno);
        $stmt->bindParam(':responsavel_aluno', $responsavel_aluno);
        $stmt->bindParam(':contato', $contato);
        $stmt->execute();
        return $stmt;
    }

    public function read_aluno()
    {
        $conn = $this->connect();
        $sql = "SELECT a.id_aluno, a.id_sala, b.nome_sala, a.nome_aluno, a.numero_aluno, 
        a.endereco_aluno, a.cidade_aluno, a.responsavel_aluno, a.contato 
        FROM alunos a INNER JOIN salas b ON b.id_sala = a.id_sala ORDER BY a.id_sala, a.nome_aluno";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update_aluno()
    {
        $id_sala = filter_input(INPUT_POST,'id_sala', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_aluno = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $numero_aluno = filter_input(INPUT_POST, 'numero_aluno', FILTER_SANITIZE_NUMBER_INT);
        $endereco_aluno = filter_input(INPUT_POST, 'endereco_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade_aluno = filter_input(INPUT_POST, 'cidade_aluno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $responsavel_aluno = filter_input(INPUT_POST, 'responsavel_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "UPDATE alunos SET id_sala = :id_sala, nome_aluno = :nome_aluno, numero_aluno = :numero_aluno, 
        endereco_aluno = :endereco_aluno, cidade_aluno = :cidade_aluno, responsavel_aluno = :responsavel_aluno, contato = :contato
        WHERE id_aluno = :id_aluno";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_sala', $id_sala);
        $stmt->bindParam(':nome_aluno', $nome_aluno);
        $stmt->bindParam(':numero_aluno', $numero_aluno);
        $stmt->bindParam(':endereco_aluno', $endereco_aluno);
        $stmt->bindParam(':cidade_aluno', $cidade_aluno);
        $stmt->bindParam(':responsavel_aluno', $responsavel_aluno);
        $stmt->bindParam(':contato', $contato);
        $stmt->bindParam(':id_aluno', $id_aluno);
        $stmt->execute();
        return $stmt;


    }

    public function delete_aluno()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "delete from alunos where id_aluno = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function editFormAluno()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT a.id_aluno, a.id_sala, b.nome_sala, a.nome_aluno, a.numero_aluno, 
        a.endereco_aluno, a.cidade_aluno, a.responsavel_aluno, a.contato 
        FROM alunos a INNER JOIN salas b ON b.id_sala = a.id_sala WHERE a.id_aluno = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    //fim do crud alunos, a seguir crud ocorrencias
    public function create_ocorrencia()
    {
        //$id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "INSERT INTO ocorrencias (id_aluno, titulo, conteudo) VALUES (:id, :titulo, :conteudo)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_aluno);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->execute();
        return $stmt;
    }

    public function read_ocorrencia()
    {
        $conn = $this->connect();
        $sql = "SELECT a.id_oco, a.id_aluno, b.nome_aluno, c.nome_sala, a.titulo, a.conteudo 
        FROM ocorrencias a INNER JOIN alunos b ON b.id_aluno = a.id_aluno INNER JOIN salas c 
        ON c.id_sala = b.id_sala ORDER BY a.id_aluno";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update_ocorrencia()
    {
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_oco = filter_input(INPUT_POST, 'id_oco', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "UPDATE ocorrencias SET titulo = :titulo, conteudo = :conteudo WHERE id_oco = :id_oco";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->bindParam(':id_oco', $id_oco);
        $stmt->execute();
        return $stmt;
    }

    public function delete_ocorrencia()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "delete from ocorrencias where id_oco = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function editFormOcorrencia()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT a.id_oco, a.id_aluno, b.nome_aluno, c.nome_sala, a.titulo, a.conteudo 
        FROM ocorrencias a INNER JOIN alunos b ON b.id_aluno = a.id_aluno INNER JOIN salas c 
        ON c.id_sala = b.id_sala WHERE a.id_oco = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    //fim do crud ocorrencias, a partir daqui crud para chamadas
    public function getAlunosPorSala()
    {
        $id_sala = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT id_aluno, nome_aluno FROM alunos WHERE id_sala = :id_sala";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_sala', $id_sala);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    function converteDataParaMySQL($data) {
        $dataFormatada = date('Y-m-d', strtotime(str_replace('/', '-', $data)));
        return $dataFormatada;
    }

    function converteDataParaExibicao($data) {
        $dataFormatada = date('d/m/Y', strtotime($data));
        return $dataFormatada;
    }

    public function create_chamada()
    {
        $id_sala = filter_input(INPUT_POST, 'id_sala', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data = $this->converteDataParaMySQL(filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS));
        $periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $seq_aula = filter_input(INPUT_POST, 'seq_aula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $alunos_presentes = isset($_POST['presenca']) ? $_POST['presenca'] : [];
        $conn = $this->connect();
        $sql = "INSERT INTO chamadas (id_sala, dt_chamada, periodo, seq_aula, id_aluno, presenca) VALUES (:id_sala, :dt_chamada, :periodo, :seq_aula, :id_aluno, :presenca)";
        $stmt = $conn->prepare($sql);

        foreach ($alunos_presentes as $id_aluno => $presenca) {
            $stmt->bindParam(':id_sala', $id_sala);
            $stmt->bindParam(':dt_chamada', $data);
            $stmt->bindParam(':periodo', $periodo); 
            $stmt->bindParam(':seq_aula', $seq_aula);
            $stmt->bindParam(':id_aluno', $id_aluno);
            $stmt->bindParam(':presenca', $presenca);
            $stmt->execute();
        }

        return $stmt;
    }

    public function read_chamada()
    {
        $conn = $this->connect();
        $sql = "SELECT a.id_chamada, a.id_sala, b.nome_sala, a.dt_chamada, a.periodo, a.seq_aula, 
        a.id_aluno, c.nome_aluno, c.numero_aluno, a.presenca FROM chamadas a INNER JOIN salas b ON b.id_sala = a.id_sala 
        INNER JOIN alunos c ON c.id_aluno = a.id_aluno ORDER BY a.id_sala, a.seq_aula, a.id_aluno";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update_chamada()
    {
        $presenca = filter_input(INPUT_POST, 'presenca', FILTER_SANITIZE_SPECIAL_CHARS);
        $novaPresenca = $presenca === 'Presente' ? 'N' : 'S';
        $id = filter_input(INPUT_POST, 'id_chamada', FILTER_SANITIZE_SPECIAL_CHARS);
        $conn = $this->connect();
        $sql = "UPDATE chamadas SET presenca = :presenca WHERE id_chamada = :id_chamada";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':presenca', $novaPresenca);
        $stmt->bindParam(':id_chamada', $id);
        $stmt->execute();
        return $stmt;
        //var_dump($novaPresenca);
    }

    public function delete_chamada()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "delete from chamadas where id_chamada = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function editFormChamada()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $conn = $this->connect();
        $sql = "SELECT a.id_chamada, a.id_sala, b.nome_sala, a.dt_chamada, a.periodo, a.seq_aula, 
        a.id_aluno, c.nome_aluno, c.numero_aluno, a.presenca FROM chamadas a INNER JOIN salas b ON b.id_sala = a.id_sala 
        INNER JOIN alunos c ON c.id_aluno = a.id_aluno WHERE a.id_chamada = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
}