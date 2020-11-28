<?php
include "../database/connection.php";
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    if ($usuario == "") {
        $msg = "Usuário não preenchido";
        $status = "danger";
    } elseif ($senha == "") {
        $msg = "Senha não preenchida";
        $status = "danger";
    }else{
        $sql_sel = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        $instrucao = $db_connection->prepare($sql_sel);
        $instrucao->execute();
        $conta = $instrucao->fetchAll(PDO::FETCH_ASSOC);
        $count = $instrucao->rowCount();
        
        if($count > 0){
            session_start();
            $_SESSION['id'] = $conta[0]["id"];
            $_SESSION['usuario'] = $usuario;
            $_SESSION['idsessao'] = session_id();

            $msg = "Seja Bem-vindo $usuario";
            $status = "success";

            echo "<script>location.href='../../index.php?folder=templates/&file=principal.php&msg=$msg&status=$status';</script>";
        }else{
            $msg = "Usuário ou senha incorretos";
            $status = "danger";
        }
    }
    echo "<script>location.href='../../index.php?folder=templates/&file=form_login.php&msg=$msg&status=$status';</script>";
?>
