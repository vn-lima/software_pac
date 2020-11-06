<body class="fundo">
    <div class="container">
        <h3 class=title-Cadastro>
            Cadastre-se e conheça nossos produtos!
        </h3>

        <br>
        <form id="FormularioCadastro" method="post" action="usuario.php">
            <div class="Formulario">
                <label for="nome"> <i class="fas fa-user icon-modify"> </i> Nome:</label><br>
                <input type="text" class="inputs" name="nome" id="nome" required>
            </div>

            <div class="Formulario">
                <label for="cpf"> <i class="fas fa-user-check icon-modify"></i> CPF: </label>
                <br>
                <input type="text" class="inputs" name="cpf" id="cpf" required>
            </div>

            <div class="Formulario">
                <label for="endereco"> <i class="fas fa-map-marker-alt icon-modify"></i> Endereço: </label><br>
                <input type="text" class="inputs" name="endereco" id="endereco" required>
            </div>

            <div class="Formulario">
                <label for="telefone"> <i class="fas fa-phone-square-alt icon-modify"></i> Telefone: </label> <br>
                <input type="text" class="inputs" name="telefone" id="telefone" required>
            </div>

            <div class="Formulario">
                <label for="email"> <i class="fas fa-envelope-square icon-modify"></i> Email: </label> <br>
                <input type="text" class="inputs" name="email" id="email" required>
            </div>

            <div class="Formulario">
                <label for="username"> <i class="far fa-user"></i> Username: </label> <br>
                <input type="text" class="inputs" name="usarname" id="username" required>
            </div>

            <div class="Formulario">
                <label for="senha"> <i class="fas fa-unlock icon-modify"></i> Senha: </label> <br>
                <input type="password" class="inputs" name="senha" id="senha" required>
            </div>
            <br>
            <div class="Formulario">
                <input type="submit">
                <input type="reset">
            </div>
        </form>
        <br>
    </div>
</body>
<script>
$(document).ready(function() {
    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask('(00) 00000-0000');
});
</script>