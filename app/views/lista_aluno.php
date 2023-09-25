<div class="row container">
    <div class="col s12">
        <h3 class="light center">Alunos cadastrados</h3>
    </div>

    <div class="col s12">
        <a href="?router=Site/cadastro_aluno" class="btn-small green">Novo aluno</a>
    </div>

    <div class="col s12">
        <table>
            <tr>
                <th>Sala</th><th class="center">Número</th><th>Nome</th><th class="center">Ações</th>
            </tr>
            <?php foreach($consulta_aluno as $registro): ?>

            <tr>
                <td><?php echo $registro['nome_sala'] ?></td>
                <td class="center"><?php echo $registro['numero_aluno'] ?></td>
                <td><?php echo $registro['nome_aluno'] ?></td>       
                
                <td class="center">
                    <a href="?router=Site/edita_aluno/&id=<?php echo base64_encode($registro['id_aluno'])?> " class="btn-small blue">Expandir</a>
                    <a href="?router=Site/cadastro_ocorrencia/&id=<?php echo base64_encode($registro['id_aluno'])?> " class="btn-small orange">+Ocorrência</a>
                    <a href="?router=Site/confirmaDeleteAluno/&id=<?php echo base64_encode($registro['id_aluno'])?>" class="btn-small red">Excluir</a>
                </td>
                
            </tr>    

            <?php endforeach; ?>
        </table>    
    </div>
</div>