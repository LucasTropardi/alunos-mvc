<div class="row container">
    <div class="col s12">
        <h3 class="light center">Editar registro</h3>
    </div>
    <div class="col s12">
        <form action="?router=Site/alterarAluno" method="post">
            <?php foreach($editarFormAluno as $registro): ?>
                
                <div class="input-field col s12 m6">
                    <input type="hidden" name="id_aluno" value="<?php echo $registro['id_aluno'] ?>">

                    <label>Sala</label><br>
                    <?php foreach($nomesSalas as $sala): ?>
                        <p>
                            <label>
                                <input type="radio" name="id_sala" value="<?php echo $sala['id_sala']; ?>" <?php echo ($sala['id_sala'] == $registro['id_sala']) ? 'checked' : ''; ?> onchange="checkboxes(this);" />
                                <span><?php echo $sala['nome_sala']; ?></span>
                            </label>
                        </p>
                    <?php endforeach; ?>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="nome_aluno" id="nome_aluno" value="<?php echo $registro['nome_aluno'] ?>" required>
                    <label for="nome_aluno">Nome</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="numero_aluno" id="numero_aluno" value="<?php echo $registro['numero_aluno'] ?>" required>
                    <label for="numero_aluno">Número da chamada</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="cidade_aluno" id="cidade_aluno" value="<?php echo $registro['cidade_aluno'] ?>" required>
                    <label for="cidade_aluno">Cidade</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="endereco_aluno" id="endereco_aluno" value="<?php echo $registro['endereco_aluno'] ?>" required>
                    <label for="endereco_aluno">Endereço</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="responsavel_aluno" id="responsavel_aluno" value="<?php echo $registro['responsavel_aluno'] ?>" required>
                    <label for="responsavel_aluno">Responsável</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="contato" id="contato" value="<?php echo $registro['contato'] ?>" required>
                    <label for="contato">Contato</label>
                </div>
                <div class="input-field col s12">
                    <input type="submit" value="Atualizar" class="btn-small green">
                    <a href="?router=Site/lista_aluno" class="btn-small red">Voltar</a>
                </div>

            <?php endforeach; ?>    
        </form>
    </div>
</div>