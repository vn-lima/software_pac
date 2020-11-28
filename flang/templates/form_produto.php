<div class="container">
    <form action="templates/produto.php">
        <div class="form-row formProdutos">
            <div class="col-md-6 mb-3">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" name="nome" id="nome" required>
                <label for="valor">Valor: </label>
                <input type="text" class="form-control" name="valor" id="valor" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tipo">Tipo: </label>
                <select class="form-control" name="tipo" id="tipo" required>
                    <option value="">Escolha...</option>
                    <option value="1">Eletrodomésticos</option>
                    <option value="2">Esportes</option>
                    <option value="3">Móveis</option>
                    <option value="4">Produtos de limpeza</option>
                    <option value="5">Brinquedos</option>
                    <option value="6">Roupas/Acessórios</option>
                    <option value="7">informática</option>
                    <option value="8">PetShop</option>
                    <option value="9">Livros</option>
                    <option value="10">Beleza</option>
                    <option value="11">Jogos</option>
                    <option value="12">Perfumes</option>
                    <option value="13">Antiguidades/Coleções</option>
                    <option value="14">Ferramentas e Construção</option>
                    <option value="15">Outros</option>
                </select>
                <label for="telefone">Telefone: </label>
                <input type="text" class="form-control" name="telefone" id="telefone">
            </div>
            <div class="col-md-4 mb-3">
                <input class="btn btn-primary btn-lg" type="submit">
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#valor').mask('#.##0,00', {reverse: true});
    });
</script>