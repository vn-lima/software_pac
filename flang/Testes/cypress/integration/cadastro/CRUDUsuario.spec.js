/// <reference types="cypress"/>

describe ('Ongs', () => {
    
    it.skip ('deve poder ralizar um reset nos dados', () => {
        cy.visit('http://localhost/PAC/software_pac/flang/index.php?folder=templates/&file=form_usuario.php');
        //cy.get - busca um elemento 
        //type - insere um texto
        cy.get('[id="nome"]').type('testeNome')
        cy.get('[id="cpf"]').type('99999999999')
        cy.get('[id="usuario"]').type('testeUsuario')
        cy.get('[id="email"]').type('teste@teste.com.br')
        cy.get('[id="senha"]').type('testeSenha')
        cy.get('[id="confsenha"]').type('testeSenha')
        cy.get('[id="endereco"]').type('teste teste teste teste')
        cy.get('[id="complemento"]').type('teste teste teste teste')
        cy.get('[id="estado"]').type('SC')
        cy.get('[id="cep"]').type('89222222')
        cy.get('[id="telefone"]').type('47992929218')
        cy.get('[data-cy=reset]').click()

    });

    it.skip ('devem poder realizar um cadastro', () => {
        cy.visit('http://localhost/PAC/software_pac/flang/index.php?folder=templates/&file=form_usuario.php');
        //cy.get - busca um elemento 
        //type - insere um texto
        cy.get('[id="nome"]').type('testeNome')
        cy.get('[id="cpf"]').type('99999999999')
        cy.get('[id="usuario"]').type('testeUsuario')
        cy.get('[id="email"]').type('teste@teste.com.br')
        cy.get('[id="senha"]').type('testeSenha')
        cy.get('[id="confsenha"]').type('testeSenha')
        cy.get('[id="endereco"]').type('teste teste teste teste')
        cy.get('[id="complemento"]').type('teste teste teste teste')
        cy.get('[id="estado"]').type('SC')
        cy.get('[id="cep"]').type('89222222')
        cy.get('[id="telefone"]').type('47992929218')
        cy.get('[data-cy=submit]').click()
    });

    it ('deve poder ralizar o login', () => {
        cy.visit('http://localhost/PAC/software_pac/flang/index.php?folder=templates/&file=form_login.php');
        //cy.get - busca um elemento 
        //type - insere um texto
        cy.get('[id="usuario"]').type('testeUsuario')
        cy.get('[id="senha"]').type('testeSenha')
        cy.get('[data-cy=submit]').click()

    });
    
    it ('deve poder ralizar a alteração de dados', () => {
        cy.visit('http://localhost/PAC/software_pac/flang/index.php?folder=templates/&file=form_login.php');
        //cy.get - busca um elemento 
        //type - insere um texto
        cy.get('[id="usuario"]').type('testeUsuario')
        cy.get('[id="senha"]').type('testeSenha')
        cy.get('[data-cy=submit]').click()
    });

    
});