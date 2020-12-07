<div class="container">
    <br>
    <h3>Lista de Usuários</h3>
    <br>
    <table class="table table-striped centro">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME COMPLETO</th>
                <th scope="col">CPF</th>
                <th scope="col">USUÁRIO</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">ENDEREÇO</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">ADM</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Pegamos todos os dados de produtos
                $sql_sel_user = "SELECT * FROM usuarios";
                $instrucao = $db_connection->prepare($sql_sel_user);
                $instrucao->execute();
                $usuarios = $instrucao->fetchAll(PDO::FETCH_ASSOC);
                $conta_user = $instrucao->rowCount();
                // Verificamos se existem dados no banco
                if ($conta_user != 0) {
                    foreach ($usuarios as $key => $value) {
                        ?>
                        <tr>
                            <td class="id"><?=$value['id']?></td>
                            <td class="nome"><?=$value['nome']?></td>
                            <td class="cpf"><?=$value['cpf']?></td>
                            <td class="usuario"><?=$value['usuario']?></td>
                            <td class="email"><?=$value['email']?></td>
                            <td class="endereco"><?=$value['endereco']?></td>
                            <td class="telefone"><?=$value['telefone']?></td>
                            <?php if($value['adm'] == 1): ?>
                                <td id="adm"><button class="btn btn-success"></button></td>
                            <?php endif; ?>
                            <?php if($value['adm'] == 0): ?>
                                <td id="adm"><button class="btn btn-danger"></button></td>
                            <?php endif; ?>

                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">Não existem dados nesta tabela</td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00');
        $('.telefone').mask('(00) 00000-0000');
    });
</script>