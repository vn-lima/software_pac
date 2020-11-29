<?php
include "../security/database/connection.php";

// Pegamos os valores do formulario
$nome       = $_POST['nome'];
$valor      = $_POST['valor'];
$tipo       = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$descricao  = $_POST['descricao'];
$url_img    = $_POST['url_img'];

//Verifica se existe produto com o mesmo nome 
$sql_sel_prod = "SELECT * FROM produtos WHERE nome = '$nome'";
$instrucao = $db_connection->prepare($sql_sel_prod);
$instrucao->execute();
$conta_produtos = $instrucao->rowCount();

//Verifica o ultimo produto inserido
$sql_sel_ult_prod = "SELECT * FROM produtos ORDER BY id DESC LIMIT 1";
$instrucao = $db_connection->prepare($sql_sel_ult_prod);
$instrucao->execute();
$ult_produtos = $instrucao->fetchAll(PDO::FETCH_ASSOC);
$conta_ult_produtos = $instrucao->rowCount();

//Verifica se existem dados na tabela de produtos
if ($conta_ult_produtos == 0) {
    $id_imagem = 1;
} else {
    $id_imagem = $ult_produtos[0]['id'] + 1;
}

// Validamos os campos de cpf e telefone
if ($conta_produtos == 0) {
    // Nome do arquivo da imagem
    $img = $id_imagem.'_imagem.jpg';

    //Gravamos os dados na tabela de produtos
    $sql_ins = "INSERT INTO produtos (nome, valor, tipo, quantidade, descricao, img)
        VALUE(:nome, :valor, :tipo, :quantidade, :descricao, :img)";
    $instrucao = $db_connection->prepare($sql_ins);
    $instrucao->bindParam(':nome',$nome);
    $instrucao->bindParam(':valor',$valor);
    $instrucao->bindParam(':tipo',$tipo);
    $instrucao->bindParam(':quantidade',$quantidade);
    $instrucao->bindParam(':descricao',$descricao);
    $instrucao->bindParam(':img',$img);
    $resultado = $instrucao->execute();
    //VALIDA MENSAGEM DE FALHA OU SUCESSO PARA USUÁRIO
    if ($resultado == true) {
        // Baixamos a imagem com base na url
        $caminho_img = '../assets/img/'.$img;
        file_put_contents($caminho_img, file_get_contents($url_img));
        // Retornamos uma mensagem ao usuário
        $msg= "Cadastro de Produto efetuado com sucesso";
        $status = "success";
    }else {
        $msg = "Falha ao realizar o cadastro de produto";
        $status = "danger";
    }
}else{
    $msg = "E-mail já existente";
    $status = "danger";
}

echo "<script>location.href='../index.php?folder=templates/&file=principal.php&msg=$msg&status=$status';</script>";
?>