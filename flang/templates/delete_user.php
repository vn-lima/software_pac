<?php
session_start();
include "../security/database/connection.php";

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $sql_sel_user = "DELETE FROM usuarios WHERE id = $id";
    $instrucao = $db_connection->prepare($sql_sel_user);
    $instrucao->execute();
    if ($instrucao == true) {
        $msg= "Usuário deletado com sucesso";
        $status = "success";
        session_destroy();
    } else {
        $msg = "Erro ao deletar o usuário";
        $status = "danger";
    }
}else{
    $msg = "É necessario estar logado para excluir o perfil";
    $status = "warning";
}

echo "<script>location.href='../index.php?folder=templates/&file=form_login.php&msg=$msg&status=$status';</script>";
?>