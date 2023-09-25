<div class="row container">
    <div class="col s12">
        <h3 class="light center">Salas cadastradas</h3>
    </div>

    <div class="col s12">
        <a href="?router=Site/cadastro_sala" class="btn-small green">Nova sala</a>
    </div>

    <div class="col s12">
        <table>
            <tr>
                <th>Escola</th><th>Sala</th><th class="center">Ano</th><th class="center">Turma</th><th class="center">Ações</th>
            </tr>
            <?php foreach($consulta_sala as $registro): ?>
            <tr>
                <td><?php echo $registro['nome_escola'] ?></td>
                <td><?php echo $registro['nome_sala'] ?></td>
                <td class="center"><?php echo $registro['serie'] ?></td>
                <td class="center"><?php echo $registro['turma'] ?></td>
                <td class="center">
                    <a href="?router=Site/edita_sala/&id=<?php echo base64_encode($registro['id_sala'])?> " class="btn-small blue">Editar</a>
                    <a href="?router=Site/cadastro_chamada/&id=<?php echo base64_encode($registro['id_sala'])?> " class="btn-small">+Chamada</a>
                    <a href="?router=Site/confirmaDeleteSala/&id=<?php echo base64_encode($registro['id_sala'])?>" class="btn-small red">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>    
    </div>
</div>    