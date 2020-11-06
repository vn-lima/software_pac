<div class="container">
    <h3>Realize seu login</h3>
    <div class="row">
        <div class="col-md">
            <form action="valida_login" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="usuario" class="input-group-text">Usuário</label>
                    </div>
                    <input type="text" class="form-control" name="usuario" id="usuario" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="senha" class="input-group-text">Senha</label>
                    </div>
                    <input type="password" class="form-control" name="senha" id="senha" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
            <form action="esqueciSenha.php" method="post">
                <div class="form-group">
                    <div action="esqueciSenha.php" method="post">
                        <button type="submit" class="btn btn-link">Esqueci minha senha</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>