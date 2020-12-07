<div class="container">
    <br>
    <h3>Lista de Produtos</h3>
    <br>
    <table class="table table-striped centro">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">VALOR</th>
                <th scope="col">TIPO</th>
                <th scope="col">QUANTIDADE</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Pegamos todos os dados de produtos
                $sql_sel_prod = "SELECT * FROM produtos";
                $instrucao = $db_connection->prepare($sql_sel_prod);
                $instrucao->execute();
                $produtos = $instrucao->fetchAll(PDO::FETCH_ASSOC);
                $conta_prod = $instrucao->rowCount();
                // Verificamos se existem dados no banco
                if ($conta_prod != 0) {
                    foreach ($produtos as $key => $value) {
                        switch ($value['tipo']) {
                            case 1:
                                $tipo = "Eletrodomésticos";
                                break;
                            case 2:
                                $tipo = "Esportes";
                                break;
                            case 3:
                                $tipo = "Móveis";
                                break;
                            case 4:
                                $tipo = "Brinquedos";
                                break;
                            case 5:
                                $tipo = "Roupas/Acessórios";
                                break;
                            case 6:
                                $tipo = "informática";
                                break;
                            case 7:
                                $tipo = "PetShop";
                                break;
                            case 8:
                                $tipo = "Livros";
                                break;
                            case 9:
                                $tipo = "Beleza";
                                break;
                            case 10:
                                $tipo = "Jogos";
                                break;
                            case 11:
                                $tipo = "Antiguidades/Coleções";
                                break;
                            case 12:
                                $tipo = "Ferramentas e Construção";
                                break;
                            case 13:
                                $tipo = "Outros";
                                break;
                            default:
                                $tipo = "Não Definido";
                                break;
                        }
                        ?>
                        <tr>
                            <td class="id"><?=$value['id']?></td>
                            <td><?=$value['nome']?></td>
                            <td id="valor"><?=$value['valor']?></td>
                            <td><?=$tipo?></td>
                            <td><?=$value['quantidade']?></td>
                            <td><?=$value['descricao']?></td>
                            <td>
                                <a href="index.php?folder=templates/&file=form_produto.php&id=<?=$value['id']?>" class="btn btn-primary">Alterar</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Excluir</button>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">Não existem dados nesta tabela</td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Confirmação de Exclusão de Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir este produto?
            </div>
            <div class="modal-footer">
                <button type="button" onclick="deletar()" class="btn btn-danger">Excluir</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#valor').mask('#.##0,00', {
            reverse: true
        });
    });

    function deletar() {
        window.location.href = "index.php?folder=templates/&file=delete_produto.php&id=<?=$value['id']?>";
    }
</script>