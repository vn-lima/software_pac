<?php
if (isset($_GET['id'])) {
    include "security/database/connection.php";
    $id = $_GET['id'];
    //VERIFICA SE EXISTE USUARIO COM MESMO EMAIL CADASTRADO
    $sql_sel_prod = "SELECT * FROM produtos WHERE id = $id";
    $instrucao = $db_connection->prepare($sql_sel_prod);
    $instrucao->execute();
    $produto = $instrucao->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container">
    <br>
    <div style="width: 100%; display: table;">
        <div style="display: flex">
            <div style="width: 50%; display: block;"> <img src="./assets/img/<?=$produto[0]['img']?>" class="img-thumbnail"> </div>
            <div style="width: 50%; display: block;" class="infoProduto">
                <p><p>
                <div class="nomeProduto"><?=$produto[0]['nome']?></div>
                <p><p></p>
                Por apenas: <div class= "preco">R$<?=$produto[0]['valor']?></div>
                <p></p>
                Em estoque: <?=$produto[0]['quantidade']?>
                <p></p>
                <button type="button" class="btn btn-success btn-lg" style="width:100%; margin-left:5px; margin-right:5px;">
                    Comprar
                </button>
                <p><p>
                <button type="button" class="btn btn-primary btn-lg" style="width:100%; margin-left:5px; margin-right:5px;">
                    Adicionar ao carrinho
                </button>
            </div>
        </div>
        <p></p>
        <h4>Descrição:</h4> 
        <p><?=$produto[0]['descricao']?></p>
    </div>
</div>