<?php
include "../security/database/connection.php";

// Pegamos os valores do formulario
$cpf         = $_POST['cpf'];
$usuario     = $_POST['usuario'];
$senha       = $_POST['senha'];
$confsenha   = $_POST['confsenha'];
$email       = $_POST['email'];
$endereco    = $_POST['endereco'];
$telefone    = $_POST['telefone'];
$nome        = $_POST['nome'];
$complemento = $_POST['complemento'];
$estado      = $_POST['estado'];
$cep         = $_POST['cep'];
$adm         = 0;

// Pegamos apenas os numeros do cpf
$cpf = preg_replace( '/[^0-9]/is', '', $cpf );
$telefone = preg_replace( '/[^0-9]/is', '', $telefone );

// Validamos os campos de cpf e telefone
if (strlen($cpf) != 11) {
    $msg = "O CPF digitado está incorreto";
    $status = "danger";
} elseif(strlen($telefone) != 11) {
    $msg = "O Telefone digitado está incorreto";
    $status = "danger";
} elseif($senha != $confsenha) {
    $msg = "A Senha digitada está incorreta";
    $status = "danger";
}else{
    //VERIFICA SE EXISTE USUARIO COM MESMO NOME DE USUARIO CADASTRADO
    $sql_sel_user = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $instrucao = $db_connection->prepare($sql_sel_user);
    $instrucao->execute();
    $usuarios = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_user = $instrucao->rowCount();
    //VERIFICA SE EXISTE USUARIO COM MESMO E-MAIL CADASTRADO
    $sql_sel_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $instrucao = $db_connection->prepare($sql_sel_email);
    $instrucao->execute();
    $emails = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_email = $instrucao->rowCount();
    //VERIFICA SE EXISTE USUARIO COM MESMO CPF CADASTRADO
    $sql_sel_cpf = "SELECT * FROM usuarios WHERE cpf = $cpf";
    $instrucao = $db_connection->prepare($sql_sel_cpf);
    $instrucao->execute();
    $cpfs = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_cpf = $instrucao->rowCount();
    //VALIDA SE NÃO EXISTE DADOS REPETIDOS
    if ($conta_user == 0) {
        if ($conta_email == 0) {
            if ($conta_cpf == 0) {
                $sql_ins = "INSERT INTO usuarios (cpf, usuario, senha, email, endereco, telefone, nome, complemento, estado, cep, adm)
                    VALUE(:cpf, :usuario, :senha, :email, :endereco, :telefone, :nome, :complemento, :estado, :cep, :adm)";
                $instrucao = $db_connection->prepare($sql_ins);
                $instrucao->bindParam(':cpf',$cpf);
                $instrucao->bindParam(':usuario',$usuario);
                $instrucao->bindParam(':senha',$senha);
                $instrucao->bindParam(':email',$email);
                $instrucao->bindParam(':endereco',$endereco);
                $instrucao->bindParam(':telefone',$telefone);
                $instrucao->bindParam(':nome',$nome);
                $instrucao->bindParam(':complemento',$complemento);
                $instrucao->bindParam(':estado',$estado);
                $instrucao->bindParam(':cep',$cep);
                $instrucao->bindParam(':adm',$adm);
                $resultado = $instrucao->execute();
                //VALIDA MENSAGEM DE FALHA OU SUCESSO PARA USUÁRIO
                if ($resultado == true) {
                    $msg= "Cadastro efetuado com sucesso";
                    $status = "success";
                }else {
                    $msg = "Falha ao realizar o cadastro";
                    $status = "danger";
                }
            }else{
                $msg = "CPF já existente";
                $status = "danger";
            }
        }else {
            $msg = "E-mail já existente";
            $status = "danger";
        }
    }else{
        $msg = "Usuário já existente";
        $status = "danger";
    }
}

echo "<script>location.href='../index.php?folder=templates/&file=form_usuario.php&msg=$msg&status=$status';</script>";
?>