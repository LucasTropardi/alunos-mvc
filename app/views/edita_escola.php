<div class="row container">
    <div class="col s12">
        <h3 class="light center">Editar registro</h3>
    </div>
    <div class="col s12">
        <form action="?router=Site/alterarEscola/" method="post">
            <?php foreach($editarFormEscola as $registro): ?>
                
                <input type="hidden" name="id_escola" value="<?php echo $registro['id_escola'] ?>">
                <div class="input-field col s12 m6">
                    <input type="text" name="nome_escola" id="nome_escola" value="<?php echo $registro['nome_escola'] ?>"required>
                    <label for="nome_escola">Nome</label>
                </div>
                
                <div class="input-field col s12 m6">
                    <input type="text" name="cidade_escola" id="cidade_escola" value="<?php echo $registro['cidade_escola'] ?>" required>
                    <label for="cidade_escola">Cidade</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="endereco_escola" id="endereco_escola" value="<?php echo $registro['endereco_escola'] ?>" required>
                    <label for="endereco_escola">Endereco</label>
                </div>

                <br>
                
                <div class="input-field col s12">
                    <input type="submit" value="Salvar" class="btn-small green">
                    <a href="?router=Site/lista_escola" class="btn-small red">Voltar</a>
                </div>

            <?php endforeach; ?>  
        </form>  
    </div>
</div>    