<?php
include "../security/database/connection.php";

if (isset($_GET["id"])) {
    // Pegamos as variaveis necessarias para a exclusao da imagem e do dado no DB
    $id = $_GET["id"];
    // Deletamos o produto
    $sql_del_prod = "DELETE FROM produtos WHERE id = $id";
    $instrucao = $db_connection->prepare($sql_del_prod);
    $instrucao->execute();
    if ($instrucao == true) {
        // Excluimos a imagem do produto
        unlink("assets/img/".$id."_imagem.jpg");
        // Retornamos uma mensagem ao usuario
        $msg= "Produto deletado com sucesso";
        $status = "success";
    } else {
        $msg = "Erro ao deletar o produto";
        $status = "danger";
    }
}else{
    $msg = "O produto não foi especificado";
    $status = "danger";
}

echo "<script>location.href='index.php?folder=templates/&file=lista_produtos.php&msg=$msg&status=$status';</script>";
?>