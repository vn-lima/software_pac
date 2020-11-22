<div class="container">
    <div class="tituloCadastro">Cadastro de cliente</div>
    <div class="row">
        <div class="col">
            <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="usuario">Usuário</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="confsenha">Confirmar senha</label>
                        <input type="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault04">Complemento</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" placeholder="SC" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telefone">Telefone Celular</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3 ">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                        <button type="reset" class="btn btn-link btn-lg">Limpar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
    });
</script>