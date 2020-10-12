<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home|Funcionários</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <style>
          /* Responsive Table */
          .table {
               background: #ffffff;
          }
          .table thead {
              background: #f5f5f5;
          }
          /* Small Sizes */
          @media (max-width: 767px) { 
          /* Responsive Table */
          .table {
               border: 1px solid red;
               width: 100%;
          }
          .table-responsive {
               display: block;
               position: relative;  
              }
          }
     </style>
</head>

<body>
     <!-- Admin Painel Include  -->
     <?php include 'header.html'; ?>
     <?php include '../controller/funcionarioController.php';?>

     <div id="page-wrapper">
          <div class="container-fluid">
               <!-- Content -->
               <div class="col-sm-6">
                    <h2>
                         <p>Funcionários <b>Detalhes</b></p>
                         
                    </h2>
               </div>

               <div class="col-sm-6">
                    <br>
                    <a class="btn btn-success" href="form-cad-func.php"
                         style="text-decoration: none; color: white; float: right;">+Novo</a>
                    <br>
               </div>
               <!-- Table-->
               <table class="table table-responsive">
                    <!-- Head -->
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Thumb</th>
                              <th >Nome</th>
                              <th >Email</th>
                              <th>Telefone</th>
                              <th>Telefone2</th>
                              <th style="width: 5%">Editar</th>
                              <th style="width: 5%">Add Tel</th>
                              <th style="width: 5%">Excluir</th>
                         </tr>
                    </thead>
                    <!-- Body -->
                    <tbody>
                         <tr>
                              <?php $lista = FuncionarioController::listar();?>
                         </tr>
                    </tbody>
               </table>

               <!-- Teble End-->


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