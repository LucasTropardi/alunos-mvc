<div class="row container">
    <div class="col s12">
        <h3 class="light center">Editar registro</h3>
    </div>

    <div class="col s12">
        <form action="?router=Site/alterarSala/" method="post">
            <?php foreach($editarFormSala as $registro): ?>
                <input type="hidden" name="id_sala" value="<?php echo $registro['id_sala'] ?>">
                <div class="input-field col s12 m6">
                    <?php foreach($nomesEscolas as $escola): ?>
                        <p>
                            <label>
                                <input type="radio" name="id_escola" value="<?php echo $escola['id_escola']; ?>" <?php echo ($escola['id_escola'] == $registro['id_escola']) ? 'checked' : ''; ?> onchange="toggleCheckboxes(this);" />
                                <span><?php echo $escola['nome_escola']; ?></span>
                            </label>
                        </p>
                    <?php endforeach; ?>
                </div>
                    
                <div class="input-field col s12">
                    <input type="text" name="nome_sala" id="nome_sala" value="<?php echo $registro['nome_sala'] ?>" required>
                    <label for="nome_sala">Nome</label>
                </div>

                <div class="input-field col s12 m6">
                    <input type="text" name="serie" id="serie" value="<?php echo $registro['serie'] ?>" required>
                    <label for="serie">Ano</label>
                </div>

                <div class="input-field col s12 m6">
                    <input type="text" name="turma" id="turma" value="<?php echo $registro['turma'] ?>" required>
                    <label for="turma">Turma</label>
                </div>

                <br>
                
                <div class="input-field col s12">
                    <input type="submit" value="Salvar" class="btn-small green">
                    <a href="?router=Site/lista_sala" class="btn-small red">Voltar</a>
                </div>

            <?php endforeach; ?>
        </form>
    </div>
</div>