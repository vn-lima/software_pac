<!DOCTYPE html>
<html lang="pt_BR" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flang</title>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/jquery/src/jquery.mask.js"></script>
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php?folder=templates/&file=form_usuario.php">Crie sua conta</a>
                <a href="index.php?folder=templates/&file=telaLogin.php">login</a>
                <a href="index.php?folder=templates/&file=esqueciSenha.php">Recupere sua senha</a>
            </nav>
        </header>
        <div>
            <?php
                if(isset($_GET['folder'])&&isset($_GET['file'])){
                    if(@!include $_GET['folder'].$_GET['file']){
                        echo "404 - pagina não encontrada";
                    }
                }else{
                    include "templates/principal.php";
                }
            ?>
        </div>
        <footer>
            <div>© Direitos autorais 2020</div>
        </footer>
    </body>
</html>
