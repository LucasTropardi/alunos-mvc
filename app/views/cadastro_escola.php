<div class="row container">
    <div class="col s12">
        <h3 class="light center">Nova escola</h3>
    </div>

    <div class="col s12">
        <form action="?router=Site/cadastro_escola" method="post">
            <div class="input-field col s12 m6">
                <input type="text" name="nome_escola" id="nome_escola" required>
                <label for="nome_escola">Nome</label>
            </div>
            
            <div class="input-field col s12 m6">
                <input type="text" name="cidade_escola" id="cidade_escola" required>
                <label for="cidade_escola">Cidade</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="endereco_escola" id="endereco_escola" required>
                <label for="endereco_escola">Endereco</label>
            </div>

            <br>
            
            <div class="input-field col s12">
                <input type="submit" value="Salvar" class="btn-small green">
                <input type="reset" value="Limpar" class="btn-small red">
            </div>
        </form>
    </div>
</div>