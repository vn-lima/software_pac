<div class="container">
    <div class="py-5 text-center tituloCadastro"> Finalizar compra</div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Seu carrinho</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Confirmar informações</h4>
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" placeholder="" value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="endereço">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="" value="" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" placeholder="" value="" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control" id="cep" placeholder="" required>
                    </div>
                </div>

                <h4 class="mb-3">Informações de pagamento</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="codName">Nome do código</label>
                        <input type="text" class="form-control" id="codName" placeholder="" required>
                        <small class="text-muted">Nome conforme cadastro do código</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="codPag">Código de pagamento</label>
                        <input type="number" class="form-control" id="codPag" placeholder="" required>
                        <small class="text-muted">Código enviado por e-mail</small>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar compra</button>
            </form>
        </div>
    </div>
</div>