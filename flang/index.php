<?php
session_start();

include "security/database/connection.php";

// Verifica se o usuario esta logado
if (isset($_SESSION["id"])) {
    $logado = 1;
    $id = $_SESSION["id"];
    //Verifica se existe adm com este usuario
    $sql_sel_adm = "SELECT * FROM usuarios WHERE id = $id AND adm = 1";
    $instrucao = $db_connection->prepare($sql_sel_adm);
    $instrucao->execute();
    $adms = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_adm = $instrucao->rowCount();
    // Verifica se o usuario é adm
    if ($conta_adm != 0) {
        $adm = 1;
    }else{
        $adm = 0;
    }
}else{
    $logado = 0;
    $adm = 0;
}
?>

<!DOCTYPE html>
<html lang="pt_BR" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flang</title>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/jquery/src/jquery.mask.js"></script>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php?">Home</a>
                <ul class="navbar-nav mr-auto">
                    <?php if($adm == 1): ?>
                        <li class="nav-item active">
                            <a class="navbar-brand" href="index.php?folder=templates/&file=form_produto.php">Cadastrar Produtos</a>
                        </li>
                    <?php endif; ?>

                    <?php if($logado == 1): ?>
                        <li class="nav-item active">
                            <a class="navbar-brand" href="index.php?folder=templates/&file=perfil.php">Perfil</a>
                        </li>
                    <?php endif; ?>

                    <?php if($logado == 1): ?>
                        <li class="nav-item active">
                            <a class="navbar-brand" href="security/login/logout.php">Sair</a>
                        </li>
                    <?php endif; ?>

                    <?php if($logado == 0): ?>
                        <li class="nav-item active">
                            <a class="navbar-brand" href="index.php?folder=templates/&file=form_usuario.php">Crie sua conta</a>
                        </li>
                        <li class="nav-item active">
                            <a class="navbar-brand" href="index.php?folder=templates/&file=form_login.php">Entrar</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <div>
            <?php if(isset($_GET['msg'])&&$_GET['msg']!=""): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-<?= $_GET['status']; ?> alert-dismissible fade show" role="alert">
                            <?php echo $_GET['msg']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (isset($_GET['folder']) && isset($_GET['file'])) {
                if (@!include $_GET['folder'] . $_GET['file']) {
                    echo "404 - pagina não encontrada";
                }
            } else {
                include "templates/principal.php";
            }
            ?>
        </div>
        <footer>
            <div>© Direitos autorais 2020</div>
        </footer>
    </body>
</html>