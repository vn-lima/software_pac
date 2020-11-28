<?php
include "../security/database/connection.php";

// Pegamos os valores do formulario
$usuario     = $_POST['usuario'];
$senha       = $_POST['senha'];
$email       = $_POST['email'];
$endereco    = $_POST['endereco'];
$telefone    = $_POST['telefone'];
$nome        = $_POST['nome'];
$complemento = $_POST['complemento'];
$estado      = $_POST['estado'];
$cep         = $_POST['cep'];
$id          = $_POST['id'];

if (!isset($usuario)) {
    $msg = "O Usuário não foi preenchido";
    $status = "danger";
}elseif (!isset($senha)) {
    $msg = "O Usuário não foi preenchido";
    $status = "danger";
}elseif (!isset($email)) {
    $msg = "O Email não foi preenchido";
    $status = "danger";
}elseif (!isset($endereco)) {
    $msg = "O Endereco não foi preenchido";
    $status = "danger";
}elseif (!isset($telefone)) {
    $msg = "O Telefone não foi preenchido";
    $status = "danger";
}elseif (!isset($nome)) {
    $msg = "O Nome não foi preenchido";
    $status = "danger";
}elseif (!isset($complemento)) {
    $msg = "O Complemento não foi preenchido";
    $status = "danger";
}elseif (!isset($estado)) {
    $msg = "O Estado não foi preenchido";
    $status = "danger";
}elseif (!isset($cep)) {
    $msg = "O CEP não foi preenchido";
    $status = "danger";
}else{
    //VERIFICA SE EXISTE USUARIO COM MESMO NOME DE USUARIO CADASTRADO
    $sql_sel_user = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND id <> $id";
    $instrucao = $db_connection->prepare($sql_sel_user);
    $instrucao->execute();
    $usuarios = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_user = $instrucao->rowCount();
    //VERIFICA SE EXISTE USUARIO COM MESMO EMAIL CADASTRADO
    $sql_sel_email = "SELECT * FROM usuarios WHERE email = '$email' AND id <> $id";
    $instrucao = $db_connection->prepare($sql_sel_email);
    $instrucao->execute();
    $usuarios = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_email = $instrucao->rowCount();
    //CONDIÇÃO PARA VERIFICAR EXISTENCIA DE DADOS REPETIDOS
    if ($conta_user == 0) {
        if ($conta_email == 0) {
            $sql_upd_user = "UPDATE usuarios
                SET usuario = '$usuario',
                    senha = '$senha',
                    email = '$email',
                    endereco = '$endereco',
                    telefone = '$telefone',
                    nome = '$nome',
                    complemento = '$complemento',
                    estado = '$estado',
                    cep = '$cep'
                WHERE id = $id";
            $instrucao = $db_connection->prepare($sql_upd_user);
            $instrucao->execute();
            if ($instrucao == true) {
                $msg= "Alteração efetuada com sucesso";
                $status = "success";
            } else {
                $msg = "Falha ao realizar alteração de dados do usuário";
                $status = "danger";
            }
            
        } else {
            $msg = "E-mail já existente";
            $status = "danger";
        }
    } else {
        $msg = "Usuário já existente";
        $status = "danger";
    }
}
echo "<script>location.href='../index.php?folder=templates/&file=perfil.php&msg=$msg&status=$status';</script>";
?>