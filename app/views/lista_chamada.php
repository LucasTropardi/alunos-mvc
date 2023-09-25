<div class="row container">
    <div class="col s12">
        <h3 class="light center">Chamadas registradas</h3>
    </div>
    <div class="col s12 m3">
        <form method="post">
            <label for="data">Data</label>
            <input type="text" name="data" id="data">
            <button type="submit" class="btn-small green">Filtrar</button>
        </form>
    </div>

    <div class="col s12">
        <table>
                <tr>
                    <th>Sala</th><th>Data</th><th class="center">Aula</th><th class="center">Número</th><th>Nome</th><th>Presença</th><th class="center">Ações</th>
                </tr>
                <!--<?php var_dump(filter_input(INPUT_POST,'data', FILTER_SANITIZE_SPECIAL_CHARS)) ?>-->
            <?php foreach($consulta_chamada as $registro): ?>

            <?php 
                // Verifica se a data do registro atende à condição do filtro
                if(isset($_POST['data']) && !empty($_POST['data'])){
                    $filtro_data = $this->converteDataParaMySQL($_POST['data']);
                    $data_registro = $this->converteDataParaMySQL($registro['dt_chamada']);
                    if($filtro_data != $data_registro){
                        continue; 
                    }
                }
            ?>

            <tr>
                <td><?php echo $registro['nome_sala'] ?></td>
                <td><?php echo $this->converteDataParaExibicao($registro['dt_chamada']) ?></td>
                <td class="center"><?php echo $registro['seq_aula'] ?></td>
                <td class="center"><?php echo $registro['numero_aluno'] ?></td>
                <td><?php echo $registro['nome_aluno'] ?></td>
                <td><?php echo $registro['presenca'] === 'S' ? 'Presente' : 'Ausente'; ?></td>
                <td class="center">
                    <a href="?router=Site/edita_chamada/&id=<?php echo base64_encode($registro['id_chamada'])?> " class="btn-small blue">Editar</a>
                    <a href="?router=Site/confirmaDeleteChamada/&id=<?php echo base64_encode($registro['id_chamada'])?>" class="btn-small red">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
    </div>
</div>