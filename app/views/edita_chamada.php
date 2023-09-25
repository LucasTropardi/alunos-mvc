<div class="row container">
    <div class="col s12">
        <h3 class="light center">Editar registro</h3>
        </div>

    <div class="col s12">
        <form action="?router=Site/alterarChamada/" method="post">
            <?php foreach($editarFormChamada as $registro): ?>
            <input type="hidden" name="id_chamada" value="<?php echo $registro['id_chamada'] ?>">
            <div class="input-field col s12 m6">
                <input type="text" name="nome_aluno" id="nome_aluno" value="<?php echo $registro['nome_aluno'] ?>" readonly>
                <label for="nome_aluno">Aluno</label>
            </div>

            <div class="input-field col s12 m6">
                <input type="text" name="presenca" id="presenca" value="<?php echo $registro['presenca'] === 'S' ? 'Presente' : 'Ausente'; ?>" readonly>
                <label for="presenca">Situação</label>
            </div>
            
            <div class="input-field col s12">
                <p>Deseja alterar a situação na chamada?</p>
            </div>    

            <div class="input-field col s12">
                <input type="submit" value="Alterar" class="btn-small green">
                <a href="?router=Site/lista_chamada" class="btn-small red">Voltar</a>
            </div>
            
            <?php endforeach; ?>    
            <br>        
        </form>
    </div>

</div>