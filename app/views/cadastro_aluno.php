<div class="row container">
    <div class="col s12">
        <h3 class="light center">Novo aluno</h3>
    </div>
    <div class="col s12">
        <form action="?router=Site/cadastro_aluno" method="post">
            <div class="input-field col s12 m6">
                <label>Sala</label><br>
                <?php foreach($nomesSalas as $sala): ?>
                    <p>
                        <label>
                            <input type="radio" name="id_sala" value="<?php echo $sala['id_sala']; ?>" onchange="checkboxes(this);" />
                            <span><?php echo $sala['nome_sala']; ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="input-field col s12">
                <input type="text" name="nome_aluno" id="nome_aluno" required>
                <label for="nome_aluno">Nome</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="numero_aluno" id="numero_aluno" required>
                <label for="numero_aluno">Número da chamada</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="cidade_aluno" id="cidade_aluno" required>
                <label for="cidade_aluno">Cidade</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="endereco_aluno" id="endereco_aluno" required>
                <label for="endereco_aluno">Endereço</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="responsavel_aluno" id="responsavel_aluno" required>
                <label for="responsavel_aluno">Responsável</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="contato" id="contato" required>
                <label for="contato">Contato</label>
            </div>
            <div class="input-field col s12">
                <input type="submit" value="Salvar" class="btn-small green">
                <input type="reset" value="Limpar" class="btn-small red">
            </div>
        </form>
    </div>
</div>