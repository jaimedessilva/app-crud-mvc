<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home|Funcionários</title>
</head>

<body>
    <!-- Admin Painel Include  -->
    <?php include 'header.html'; ?>
    <?php //include 'model/dao.php';?>
    <?php include '../controller/funcionarioController.php';?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Content -->
            <div class="col-sm-6">
                <h2>
                    <p>Funcionários <b>Detalhes</b></p>
                    <br>
                </h2>
            </div>

            <div class="col-sm-6">
                <br>
                <iput type="button class" class="btn btn-success" style="float: right;">
                    <a href="form-cad-func.php" style="text-decoration: none; color: white;">+Novo</a>
                    <br>
            </div>

            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Thumb</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Telefone+</th>
                    <!--                             <th>CPF</th> -->
                    <th>Editar</th>
                    <th>Add<br>+Telefone</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php $lista = FuncionarioController::listar();?>
                    </tr>
                </tbody>
            </table>


            <!-- Paginação -->
            <div class="clearfix">
                <div class="hint-text">
                    Não Paginado ainda
                    <!--                         Showing <b>5</b> out of <b>25</b> entries -->
                </div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <!--                         <li class="page-item"><a href="#" class="page-link">1</a></li> -->
                    <!--                         <li class="page-item"><a href="#" class="page-link">2</a></li> -->
                    <!--                         <li class="page-item active"><a href="#" class="page-link">3</a></li> -->
                    <!--                         <li class="page-item"><a href="#" class="page-link">4</a></li> -->
                    <!--                         <li class="page-item"><a href="#" class="page-link">5</a></li> -->
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>

            <!-- End Content -->
        </div>
    </div>
</body>

</html>