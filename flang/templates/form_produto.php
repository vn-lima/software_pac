<?php
if (isset($_GET['id'])) {
    include "security/database/connection.php";
    $id = $_GET['id'];
    //VERIFICA SE EXISTE USUARIO COM MESMO EMAIL CADASTRADO
    $sql_sel_prod = "SELECT * FROM produtos WHERE id = $id";
    $instrucao = $db_connection->prepare($sql_sel_prod);
    $instrucao->execute();
    $produtos = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    //Variaveis dos inputs
    $id       = $produtos[0]['id'];
    $nome       = $produtos[0]['nome'];
    $valor      = $produtos[0]['valor'];
    $tipo       = $produtos[0]['tipo'];
    $quantidade = $produtos[0]['quantidade'];
    $descricao  = $produtos[0]['descricao'];
    $url_img    = $produtos[0]['img'];
    //Variavel de verificação de update
    $upd = "templates/update_produto.php";
}else{
    //Variaveis dos inputs
    $nome = "";
    $valor = "";
    $tipo = "";
    $quantidade = "";
    $descricao = "";
    $url_img = "";
    //Variavel de verificação de update
    $upd = "templates/produto.php";
}
?>
<div class="container">
    <h3>Cadastro de Produtos</h3>
    <form action="<?=$upd?>" method="post">
        <input type="hidden" name="id" id="id" value="<?=$id?>">
        <div class="form-row formProdutos">
            <div class="col-md-4 mb-3">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?=$nome?>" required>

                <label for="valor">Valor: </label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">R$</span>
                    <input type="text" class="form-control" name="valor" id="valor" value="<?=$valor?>" required>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="tipo">Tipo: </label>
                <input type="hidden" name="tipo_2" id="tipo_2" value="<?=$tipo?>">
                <select class="form-control" name="tipo" id="tipo" required>
                    <option value="">Escolha...</option>
                    <option value="1">Eletrodomésticos</option>
                    <option value="2">Esportes</option>
                    <option value="3">Móveis</option>
                    <option value="4">Produtos de limpeza</option>
                    <option value="5">Brinquedos</option>
                    <option value="6">Roupas/Acessórios</option>
                    <option value="7">informática</option>
                    <option value="8">PetShop</option>
                    <option value="9">Livros</option>
                    <option value="10">Beleza</option>
                    <option value="11">Jogos</option>
                    <option value="12">Perfumes</option>
                    <option value="13">Antiguidades/Coleções</option>
                    <option value="14">Ferramentas e Construção</option>
                    <option value="15">Outros</option>
                </select>

                <label for="quantidade">Quantidade: </label>
                <input type="number" class="form-control" name="quantidade" id="quantidade" value="<?=$quantidade?>" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="descricao">Descrição: </label>
                <textarea type="text" class="form-control" name="descricao" id="descricao" rows="4" required><?=$descricao?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <label for="url_img">URL da Imagem: </label>
                <input type="text" class="form-control" name="url_img" id="url_img" value="<?=$url_img?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <input class="btn btn-primary btn-lg" type="submit">
            </div>
        </div>
    </form>
</div>

<script>
    var tipo = $('#tipo_2').val();
    $(document).ready(function(){
        $('#valor').mask('#.##0,00', {reverse: true});
        document.getElementById('tipo').value = tipo;
    });
</script>