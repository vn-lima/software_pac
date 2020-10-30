<div>
    <form action="">
        <div>
            <div>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required>
                <label for="valor">Valor: </label>
                <input type="text" name="valor" id="valor" required>
            </div>
            <div>
                <label for="tipo">Tipo: </label>
                <select name="tipo" id="tipo" required>
                    <option value="">Escolha...</option>
                    <option value="1">Eletrodomésticos</option>
                    <option value="2">Games</option>
                    <option value="3">Informática</option>
                    <option value="4">Moda</option>
                    <option value="5">Esporte</option>
                    <option value="6">Móveis e Decoração</option>
                    <option value="7">Beleza</option>
                    <option value="8">Livros</option>
                    <option value="9">Outros</option>
                </select>

                <label for="telefone">Telefone: </label>
                <input type="text" name="telefone" id="telefone">
            </div>
            <div>
                <input type="submit">
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#valor').mask('#.##0,00', {reverse: true});
    });
</script>