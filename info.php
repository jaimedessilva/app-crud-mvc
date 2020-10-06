<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
</head>

<body>
    <!-- Admin Painel Include  -->
    <div></div>
    <?php include 'header.html';?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Content -->

            <h1><a href="#">Sistema Crud MVC</a></h1>

            <a href="#">Link Sistema</a>


            <h2>Tecnologias: Html, Css, Js, PHP, Mysql, PostgrSQL</h2>

            <h2>Proposta:</h2>
            <h3>Sistema de Cadastro de funcionários</h3>
            <h4>Dados:</h4>

            <ul>
                <li>Id</li>
                <li>Nome</li>
                <li>Email</li>
                <li>Telefone</li>
                <li>Imagem</li>
            </ul>

            <h2>Tabelas:</h2>
            <ul>
                <li>Tb_funcionário</li>
                <li>Tb_telefones</li>
            </ul>

            <h2>Regras:</h2>
            <p>Sistema deve conter uma tabela relacional para o cadastro de mais de um telefone.<br>
                Sistema versionado no Github.</p>

            <h2>Pastas:</h2>

            <ul>
                <li>Templates</li>
                <li>Model</li>
                <li>View</li>
                <li>Controller</li>
            </ul>

            <h4>Data: 11/10/2020</h4>

            <p style="font-size: 16px;">Desenvolvido por SS <b>Jaime</b></p>

            <!-- End Content -->
        </div>
    </div>
</body>

</html>