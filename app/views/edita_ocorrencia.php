<div class="row container">
    <div class="col s12">
        <h3 class="light center">Editar registro</h3>
    </div>
    <div class="col s12">
        <form action="?router=Site/alterarOcorrencia" method="post">
            <?php foreach($editarFormOcorrencia as $registro): ?>
            <input type="hidden" name="id_oco" value="<?php echo $registro['id_oco'] ?>">
            <input type="hidden" name="id_aluno" id="id_aluno" value="<?php echo isset($_GET['id']) ? base64_decode($_GET['id']) : ''; ?>">

            <div class="input-field col s12">
                <input type="text" name="titulo" id="titulo" value="<?php echo $registro['titulo'] ?>" required>
                <label for="titulo">Título</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="conteudo" id="conteudo" value="<?php echo $registro['conteudo'] ?>" required>
                <label for="conteudo">Conteúdo</label>
            </div>    
            <div class="input-field col s12">
                <input type="submit" value="Salvar" class="btn-small green">
                <a href="?router=Site/lista_ocorrencia" class="btn-small red">Voltar</a>
            </div>

            <?php endforeach; ?>    
        </form>
    </div>
</div>