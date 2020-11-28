<?php
session_start();

if (isset($_GET['upd'])) {
    $disabled = "";
} else {
    $disabled = "disabled";
}

?>

<div class = "container">
    <h3 class = title-Cadastro>
    Seu Perfil!
    </h3>
    <br>
    <?php
        include "security/database/connection.php";
        $id = $_SESSION["id"];
        $sql_sel_user = "SELECT * FROM usuarios WHERE id = $id";
        $instrucao = $db_connection->prepare($sql_sel_user);
        $instrucao->execute();
        $usuarios = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    ?>

<?php if(isset($_GET['upd'])): ?>
    <form method="post" action="templates/update_user.php">
<?php endif; ?>
        <div class="row">
            <div class="col-md-4">
                <label for="usuario">USUARIO:</label>
                <input type="text" name="usuario" id="usuario" value="<?=$usuarios[0]['usuario']?>" <?=$disabled?>>
                <input type="hidden" name="id" id="id" value="<?=$usuarios[0]['id']?>" <?=$disabled?>>
            </div>
            <div class="col-md-4">
                <label for="senha">SENHA:</label>
                <input type="password" name="senha" id="senha" value="<?=$usuarios[0]['senha']?>" <?=$disabled?>>
            </div>
            <div class="col-md-4">
                <label for="nome">NOME COMPLETO:</label>
                <input type="text" name="nome" id="nome" value="<?=$usuarios[0]['nome']?>" <?=$disabled?>>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="email">E-MAIL:</label>
                <input type="text" name="email" id="email" value="<?=$usuarios[0]['email']?>" <?=$disabled?>>
            </div>
            <div class="col-md-4">
                <label for="telefone">TELEFONE:</label>
                <input type="text" name="telefone" id="telefone" value="<?=$usuarios[0]['telefone']?>" <?=$disabled?>>
            </div>
            <div class="col-md-4">
                <label for="endereco">ENDEREÇO:</label>
                <input type="text" name="endereco" id="endereco" value="<?=$usuarios[0]['endereco']?>" <?=$disabled?>>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="estado">ESTADO:</label>
                <input type="text" name="estado" id="estado" value="<?=$usuarios[0]['estado']?>" <?=$disabled?>>
            </div>
            <div class="col-md-4">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" value="<?=$usuarios[0]['cep']?>" <?=$disabled?>>
            </div>
            <div class="col-md-4">
                <label for="complemento">COMPLEMENTO:</label>
                <input type="text" name="complemento" id="complemento" value="<?=$usuarios[0]['complemento']?>" <?=$disabled?>>
            </div>
        </div>
        <br>

<?php if(isset($_GET['upd'])): ?>
        <input type="submit" class="btn btn-success" value="Concluir">
        <a href="index.php?folder=templates/&file=perfil.php" class="btn btn-primary">Voltar</a>
    </form>
<?php endif; ?>

    <?php if(!isset($_GET['upd'])): ?>
        <a href="index.php?folder=templates/&file=perfil.php&upd=1"><button class="btn btn-primary">Alterar Dados</button></a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Excluir Conta</button>
    <?php endif; ?>
</div>

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteLabel">Confirmação de Exclusão de Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir esta conta?
      </div>
      <div class="modal-footer">
        <button type="button" onclick="deletar()" class="btn btn-danger">Excluir</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('#telefone').mask('(00) 00000-0000');
    });

    function deletar() {
        window.location.href = "templates/delete_user.php";
    }
</script>