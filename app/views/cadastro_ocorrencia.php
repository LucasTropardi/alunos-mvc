<div class="row container">
    <div class="col s12">
        <h3 class="light center">Nova ocorrencia</h3>
    </div>

    <div class="col s12">
        <form action="?router=Site/cadastro_ocorrencia" method="post">
            <input type="hidden" name="id_aluno" id="id_aluno" value="<?php echo isset($_GET['id']) ? base64_decode($_GET['id']) : ''; ?>">

            <div class="input-field col s12">
                <input type="text" name="titulo" id="titulo" required>
                <label for="titulo">Título</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="conteudo" id="conteudo" required>
                <label for="conteudo">Conteúdo</label>
            </div>
            <div class="input-field col s12">
                <input type="submit" value="Salvar" class="btn-small green">
                <a href="?router=Site/lista_aluno" class="btn-small red">Voltar</a>
            </div>
        </form>
    </div>
</div>