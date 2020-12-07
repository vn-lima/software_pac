<?php
if (isset($_GET['tipo'])) {
    include "security/database/connection.php";
    $tipo = $_GET['tipo'];
    //VERIFICA SE EXISTE USUARIO COM MESMO EMAIL CADASTRADO
    $sql_sel_prod = "SELECT * FROM produtos WHERE tipo = $tipo";
    $instrucao = $db_connection->prepare($sql_sel_prod);
    $instrucao->execute();
    $produtos = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    $conta_produtos = $instrucao->rowCount();

    switch ($tipo) {
        case 1:
            $tipos = "Eletrodomésticos";
            break;
        case 2:
            $tipos = "Esportes";
            break;
        case 3:
            $tipos = "Móveis";
            break;
        case 4:
            $tipos = "Brinquedos";
            break;
        case 5:
            $tipos = "Roupas/Acessórios";
            break;
        case 6:
            $tipos = "informática";
            break;
        case 7:
            $tipos = "PetShop";
            break;
        case 8:
            $tipos = "Livros";
            break;
        case 9:
            $tipos = "Beleza";
            break;
        case 10:
            $tipos = "Jogos";
            break;
        case 11:
            $tipos = "Antiguidades/Coleções";
            break;
        case 12:
            $tipos = "Ferramentas e Construção";
            break;
        case 13:
            $tipos = "Outros";
            break;
    }
}
?>
<div class="container">
    <div class="container marketing">
    <br>
    
        <?php
            $cont = 0;
            if ($conta_produtos == 0) {
            ?>
                <h3 class="centro">Estamos sem produtos nesta categoria...</h3>
            <?php
            }else{
            ?>
                <h3 class="centro">Lista de <?=$tipos?></h3>
                <br>
            <?php
                foreach ($produtos as $key => $value) { 
                    $cont++;
                    if ($cont == 1) {
                    ?>
                        <div class="row">
                    <?php
                    }
                    ?>
                        <div class="col-lg-4">
                            <img width="280" height="280" src="./assets/img/<?=$value['img']?>">
                            <h2><?=$value['nome']?></h2>
                            <p class="valor">R$<?=$value['valor']?></p>
                            <p><a class="btn btn-primary" href="index.php?folder=templates/&file=info_produto.php&id=<?=$value['id']?>" role="button">Visualizar</a></p>
                        </div>
                    <?php
                    if ($cont == 4) {
                        $cont = 0;
                        ?>
                            </div>
                        <?php
                    }
                }
            }
        ?>
    </div>
</div>