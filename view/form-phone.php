<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQuery Scripts -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <!-- Mascaras de Campos -->
    <script type="text/javascript">
        $('.telefone').mask('(00) 0 0000-0000');
        $('.dinheiro').mask('#.##0,00', { reverse: true });
        $('.estado').mask('AA');
    </script>
    <title>Funcionário</title>
</head>

<body>
    <!-- Admin Painel Include  -->
    <?php include 'header.html';?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Content -->

            <div class="form-container">
                <h2>
                    Adicionar <b>Telefone</b>
                </h2>
                <form action="../controller/request.php" method="post" enctype="multipart/form-data">
                    <input type="text" class="readonly" name="id" value="<?php echo $_GET['id'];?> "
                        Placeholder="Codigo" readonly>
                    <input type="text" class="readonly" name="nome" value="<?php echo $_GET['nome'];?>" readonly>
                    <input type="text" class="readonly" name="telefone" value="<?php echo $_GET['telefone'];?>"
                        class="telefone" readonly />
                    <input type="text" name="novo" required="required" class="telefone" placeholder="DDD+Novo Numero" />

                    <br>
                    <button type="Submit" class="btn btn-success" name="adicionar">Adicionar</button>
                    <a class="btn btn-primary" href="index.php" >Voltar</a>
                </form>
            </div>
            <!-- End Content -->
        </div>
    </div>
</body>

</html>