<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
</head>
<body>
<?php include 'header.html';?>
<!-- Admin Painel Include  -->
<?php include 'header.html';?>
    <div id="page-wrapper">
        <div class="container-fluid">
        <?php
            $id = $_GET['id'];
            $nome = $_GET['nome'];

        ?>
        
            <h3>Tem Certeza que deseja remover: <b><?php echo $nome;?></b></h3>
            <a class="btn btn-danger" href="../controller/request.php?id=<?php echo $id;?>">Sim</a>
            <br><br>
            <a class="btn btn-primary" href="index.php">Não</a>
        </div>
    </div>

    
</body>
</html>
