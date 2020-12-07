<?php

$sql_sel_prod = "SELECT * FROM produtos ORDER BY id DESC LIMIT 3";
$instrucao = $db_connection->prepare($sql_sel_prod);
$instrucao->execute();
$prods = $instrucao->fetchAll(PDO::FETCH_ASSOC);
$conta_prods = $instrucao->rowCount();

?>
<main role="main">
    <?php if($conta_prods > 0): ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php
                    $cont = 0;
                    foreach ($prods as $key => $value) {
                        if ($cont == 0) {
                            $classe = "carousel-item active";
                        }else{
                            $classe = "carousel-item";
                        }
                        ?>
                        <div class="<?=$classe?>">
                            <img class="bd-placeholder-img" width="100%" height="100%" src="./assets/img/<?=$prods[$cont]["img"]?>" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#777" /></svg>
                            <div class="container">
                                <div class="carousel-caption text-left">
                                    <h1><?=$prods[$cont]["nome"]?></h1>
                                    <p><?=$prods[$cont]["descricao"]?></p>
                                    <p><a class="btn btn-lg btn-primary" href="index.php?folder=templates/&file=info_produto.php&id=<?=$prods[$cont]['id']?>" role="button">Visualizar</a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $cont++;
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php endif; ?>
    <br>
    <!-- TIPOS DE PRODUTOS -->
    <div class="container marketing">
        <?php
            for ($i=1; $i < 13; $i++) { 
                switch ($i) {
                    case 1:
                        $tipo = "Eletrodomésticos";
                        break;
                    case 2:
                        $tipo = "Esportes";
                        break;
                    case 3:
                        $tipo = "Móveis";
                        break;
                    case 4:
                        $tipo = "Brinquedos";
                        break;
                    case 5:
                        $tipo = "Roupas/Acessórios";
                        break;
                    case 6:
                        $tipo = "informática";
                        break;
                    case 7:
                        $tipo = "PetShop";
                        break;
                    case 8:
                        $tipo = "Livros";
                        break;
                    case 9:
                        $tipo = "Beleza";
                        break;
                    case 10:
                        $tipo = "Jogos";
                        break;
                    case 11:
                        $tipo = "Antiguidades/Coleções";
                        break;
                    case 12:
                        $tipo = "Ferramentas e Construção";
                        break;
                }
                if ($i == 1 || $i == 4 || $i == 7 || $i == 10) {
                ?>
                    <div class="row">
                <?php
                }
                ?>
                    <div class="col-lg-4">
                        <img width="280" height="280" src="./assets/img/<?=$i?>_tipo.jpg">
                        <title>Placeholder</title>
                        </svg>
                        <h2><?=$tipo?></h2>
                        <p><a class="btn btn-primary" href="index.php?folder=templates/&file=tipo_produto.php&tipo=<?=$i?>" role="button">Visualizar</a></p>
                    </div>
                <?php
                if ($i == 3 || $i == 6 || $i == 9 || $i == 12) {
                    ?>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
</main>