<?php
    session_start();
    session_destroy();
    $msg = "Você foi desconectado da sua sessão";
    $status = "primary";
    echo "<script>location.href='../../index.php?folder=templates/&file=principal.php&msg=$msg&status=$status';</script>";
?>