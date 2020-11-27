<?php
    include "security/database/connection.php";

    $cpf = "32345678911";
    $username = "3vini";
    $email = "3vini_lima@gmail.com";
    $senha = "123456";
    $endereco = "Rua eu tu noix bota nela";
    $telefone = "37999669966";
    $adm = 0;
    $nome = "3Vinicius";

    $sql_ins = "INSERT INTO usuario (CPF, Username, Email, Senha, Endereco, Telefone, Adm, Nome)
        VALUE(:cpf, :username, :email, :senha, :endereco, :telefone, :adm, :nome)";
    $instrucao = $db_connection->prepare($sql_ins);
    $instrucao->bindParam(':cpf',$cpf);
    $instrucao->bindParam(':username',$username);
    $instrucao->bindParam(':email',$email);
    $instrucao->bindParam(':endereco',$endereco);
    $instrucao->bindParam(':telefone',$telefone);
    $instrucao->bindParam(':adm',$adm);
    $instrucao->bindParam(':nome',$nome);
    $instrucao->bindParam(':senha',$senha);
    $resultado = $instrucao->execute();

    if ($resultado) {
        echo "true";
    } else {
        echo "false";
    }
    
?>