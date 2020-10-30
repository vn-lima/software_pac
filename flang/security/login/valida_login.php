<?php
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $msg = "";

    if ($usuario == "") {
        $msg = "Usuário não preenchido";
    } elseif ($senha == "") {
        $msg = "Senha não preenchida";
    }else{
        include "../database/connection.php";
        $senha_hash = md5($senha);
        $sql_sel = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha_hash'";
        $instrucao = $db_connection->prepare($sql_sel);
        $instrucao->execute();
        $count = $instrucao->rowCount();

        if($count > 0){
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['idsessao'] = session_id();

            header("Location: index.php?folder=templates/&file=principal.php");
        }else{
            $msg = "Usuário ou senha incorretos";
        }
    }
?>

<?php
echo $msg;
?>