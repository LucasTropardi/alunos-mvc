<div class="row container">
<div class="col s12">
    <h3 class="light center">Nova sala</h3>
</div>

<div class="col s12">
    <form action="?router=Site/cadastro_sala" method="post">

        <div class="input-field col s12 m6">
            <label>Escola</label><br>
            <?php foreach($nomesEscolas as $escola): ?>
                <p>
                    <label>
                        <input type="radio" name="id_escola" value="<?php echo $escola['id_escola']; ?>" onchange="toggleCheckboxes(this);" />
                        <span><?php echo $escola['nome_escola']; ?></span>
                    </label>
                </p>
            <?php endforeach; ?>
        </div>
            
        <div class="input-field col s12">
            <input type="text" name="nome_sala" id="nome_sala" required>
            <label for="nome_sala">Nome</label>
        </div>

        <div class="input-field col s12 m6">
            <input type="text" name="serie" id="serie" required>
            <label for="serie">Ano</label>
        </div>

        <div class="input-field col s12 m6">
            <input type="text" name="turma" id="turma" required>
            <label for="turma">Turma</label>
        </div>

        <br>
        
        <div class="input-field col s12">
            <input type="submit" value="Salvar" class="btn-small green">
            <input type="reset" value="Limpar" class="btn-small red">
        </div>
    </form>
</div>
</div>