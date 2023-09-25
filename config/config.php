<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Alunos</title>
    <link rel="stylesheet" href="config/materialize/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>



    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #37474f;
            color: #fff;
            text-align: center;
        }
        p {
            size: 15px;
        }
        
    </style>
</head>
<body>

    <nav class="blue-grey darken-3">
        <div class="nav-wrapper container">
            <a href="?router=Site/home/" class="brand-logo">Início</a>

            <ul class="right">
                <li><a href="?router=Site/lista_escola">Escolas</a></li>
                <li><a href="?router=Site/lista_sala">Salas</a></li>
                <li><a href="?router=Site/lista_aluno">Alunos</a></li>
                <li><a href="?router=Site/lista_ocorrencia">Ocorrências</a></li>
                <li><a href="?router=Site/lista_chamada">Chamadas</a></li>
            </ul>
        </div>
    </nav>
    <div class="blue-grey darken-3">
        <footer>
            <p><strong>Desenvolvido por Lucas Tropardi 2023 ©</strong></p>
        </footer>
    </div>
    <script src="config/materialize/js/materialize.min.js"></script>
    <script src="config/materialize/js/checkbox.js"></script>

</body>
</html>
