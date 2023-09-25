<div class="row container">
    <div class="col s12">
        <h3 class="light center">Nova chamada</h3>
    </div>
    <div class="col s12">
        <form action="?router=Site/cadastro_chamada" method="post">
            <input type="hidden" name="id_sala" id="id_sala" value="<?php echo isset($_GET['id']) ? base64_decode($_GET['id']) : ''; ?>">
            <div class="col s12">
                <p>Período:</p>
                <label>
                    <input type="radio" name="periodo" value="M" <?php echo $periodoManhaChecked ? 'checked' : ''; ?>>
                    <span>Manhã</span>
                </label>
                <label>
                    <input type="radio" name="periodo" value="T" <?php echo $periodoTardeChecked ? 'checked' : ''; ?>>
                    <span>Tarde</span>
                </label>
                <label>
                    <input type="radio" name="periodo" value="N" <?php echo $periodoNoiteChecked ? 'checked' : ''; ?>>
                    <span>Noite</span>
                </label>
            </div>
                <div class="input-field col s12 m6">
                <input type="text" name="seq_aula" id="seq_aula" required>
                <label for="seq_aula">Aula do dia</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="data" id="data" required>
                <label for="data">Data</label>
            </div>
            <div class="input-field col s12">
                <!--<?php var_dump($alunos); ?>-->
                <table>
                    <tr>
                        <th>Nome</th><th class="center">Presença</th>
                    </tr>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?php echo $aluno['nome_aluno']; ?></td>
                            <td class="center"> 
                                <label>
                                    <input type="radio" name="presenca[<?php echo $aluno['id_aluno']; ?>]" value="S">
                                    <span>Presente</span>
                                </label>
                                <label>
                                    <input type="radio" name="presenca[<?php echo $aluno['id_aluno']; ?>]" value="N">
                                    <span>Ausente</span>
                                </label>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="input-field col s12">
                <input type="submit" value="Salvar" class="btn-small green">
                <a href="?router=Site/lista_sala" class="btn-small red">Voltar</a>
            </div>
        </form>
    </div>
</div>