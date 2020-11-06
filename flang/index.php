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
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php?">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="navbar-brand" href="index.php?folder=templates/&file=form_login.php">login</a>
                        </li>
                        <li class="nav-item active">
                            <a class="navbar-brand" href="index.php?folder=templates/&file=form_usuario.php">Crie sua
                                conta</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" acition="#">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
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