<div class="row container">
    <div class="col s12">
        <h3 class="light center">Ocorrencias cadastradas</h3>
    </div>
    <div class="col s12">
        <table>
            <tr>
                <th>Aluno</th><th>Sala</th><th>Título</th><th>Conteúdo</th><th class="center">Ações</th>
            </tr>
            <?php foreach($consulta_ocorrencia as $registro): ?>
            <tr>
                <td><?php echo $registro['nome_aluno'] ?></td>
                <td><?php echo $registro['nome_sala'] ?></td>
                <td><?php echo $registro['titulo'] ?></td>
                <td><?php echo $registro['conteudo'] ?></td>
                <td class="center">
                    <a href="?router=Site/edita_ocorrencia/&id=<?php echo base64_encode($registro['id_oco'])?> " class="btn-small blue">Editar</a>
                    <a href="?router=Site/confirmaDeleteOcorrencia/&id=<?php echo base64_encode($registro['id_oco'])?>" class="btn-small red">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>