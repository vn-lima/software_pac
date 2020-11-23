<?php
session_start();
?>

<div class = "container">
    <h3 class = title-Cadastro>
    Seu Perfil!
    </h3>

    <br>
    <?php
        include "security/database/connection.php";
        $username = $_SESSION["usuario"];
        $sql_sel_user = "SELECT * FROM usuario WHERE Username = '$username'";
        $instrucao = $db_connection->prepare($sql_sel_user);
        $instrucao->execute();
        $usuarios = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="row">
        <div class="col-md-4">
            <label for="CPF">CPF:</label>
            <input type="text" value="<?=$usuarios[0]['CPF']?>" disabled>
        </div>
        <div class="col-md-4">
            <label for="email">E-MAIL:</label>
            <input type="text" value="<?=$usuarios[0]['Email']?>" disabled>
        </div>
        <div class="col-md-4">
            <label for="nome">NOME COMPLETO:</label>
            <input type="text" value="<?=$usuarios[0]['Nome']?>" disabled>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label for="endereco">ENDEREÇO:</label>
            <input type="text" value="<?=$usuarios[0]['Endereco']?>" disabled>
        </div>
        <div class="col-md-4">
            <label for="telefone">TELEFONE:</label>
            <input type="text" value="<?=$usuarios[0]['Telefone']?>" disabled>
        </div>
        <div class="col-md-4">
            <label for="endereco">ENDEREÇO:</label>
            <input type="text" value="<?=$usuarios[0]['Endereco']?>" disabled>
        </div>
    </div>
    <br>
    <button class="btn btn-primary">Alterar Dados</button>
    <button class="btn btn-danger" onclick="confirmDelete(<?=$usuarios[0]['Username']?>)">Excluir Conta</button>
</div>

<script>
    function confirmDelete(params) {
        var cpf = document.getElementById('cpf');
        var resposta = confirm("Deseja remover esse registro?");
        if (resposta == true) {
            window.location.href = "remover.php?cpf="+cpf;
        }
    }
    
</script>