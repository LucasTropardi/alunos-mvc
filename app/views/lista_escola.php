<div class="row container">
    <div class="col s12">
        <h3 class="light center">Escolas cadastradas</h3>
    </div>
    <div class="col s12">
        <a href="?router=Site/cadastro_escola" class="btn-small green">Nova escola</a>
    </div>
    <div class="col s12">
        <table>
            <tr>
                <th>Nome</th><th>Cidade</th><th>Endereço</th><th>Ações</th>
            </tr>
            <?php foreach($consulta_escola as $registro): ?>
                <tr>
                    <td><?php echo $registro['nome_escola'] ?></td>
                    <td><?php echo $registro['cidade_escola'] ?></td>
                    <td><?php echo $registro['endereco_escola'] ?></td>
                    <td>
                        <a href="?router=Site/edita_escola/&id=<?php echo base64_encode($registro['id_escola'])?> " class="btn-small blue">Editar</a>
                        <a href="?router=Site/confirmaDeleteEscola/&id=<?php echo base64_encode($registro['id_escola'])?>" class="btn-small red">Excluir</a>
                    </td>
                </tr>
            <?php endforeach;?>    
        </table>
    </div>
</div>