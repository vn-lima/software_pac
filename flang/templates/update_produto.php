<?php
include "../security/database/connection.php";

// Pegamos os valores do formulario
$id          = $_POST['id'];
$nome        = $_POST['nome'];
$valor       = $_POST['valor'];
$tipo        = $_POST['tipo'];
$quantidade  = $_POST['quantidade'];
$descricao   = $_POST['descricao'];
$img         = $_POST['url_img'];

if (!isset($nome) || $nome == "") {
    $msg = "O Nome não foi preenchido";
    $status = "danger";
}elseif (!isset($valor) || $valor == "") {
    $msg = "O Valor não foi preenchido";
    $status = "danger";
}elseif (!isset($tipo) || $tipo == "") {
    $msg = "O Tipo não foi preenchido";
    $status = "danger";
}elseif (!isset($quantidade) || $quantidade == "") {
    $msg = "A Quantidade não foi preenchida";
    $status = "danger";
}elseif (!isset($descricao) || $descricao == "") {
    $msg = "A Descrição não foi preenchida";
    $status = "danger";
}elseif (!isset($img) || $img == "") {
    $msg = "A URL da Imagem não foi preenchida";
    $status = "danger";
}else{
    //Verifica se existe produto com o mesmo nome
    $sql_sel_prod = "SELECT * FROM produtos WHERE nome = '$nome' AND id <> $id";
    $instrucao = $db_connection->prepare($sql_sel_prod);
    $instrucao->execute();
    $produtos = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_prod = $instrucao->rowCount();
    //Condição para verificar existencia de dados repetidos
    if ($conta_prod == 0) {
        $sql_upd_prod = "UPDATE produtos
            SET nome = '$nome',
                valor = '$valor',
                tipo = '$tipo',
                quantidade = '$quantidade',
                descricao = '$descricao',
                img = '$img'
            WHERE id = $id";
        $instrucao = $db_connection->prepare($sql_upd_prod);
        $instrucao->execute();
        if ($instrucao == true) {
            $msg= "Alteração do produto efetuada com sucesso";
            $status = "success";
        } else {
            $msg = "Falha ao realizar alteração do produto";
            $status = "danger";
        }
    } else {
        $msg = "Nome de produto já existente";
        $status = "danger";
    }
}

echo "<script>location.href='../index.php?folder=templates/&file=lista_produtos.php&msg=$msg&status=$status';</script>";
?>