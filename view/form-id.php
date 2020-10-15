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
	$('.dinheiro').mask('#.##0,00', {reverse: true});
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
					Detalhes <b>Funcionário</b>
				</h2>
				<form >
                    <?php
                    include '../controller/FuncionarioController.php';
                        $id = $_GET['id'];
                        $f = FuncionarioController::buscar($id);
                        /*echo $f[0];
                        echo "repositorio/".$f[1];
                        echo $f[2];
                        echo $f[3];
                        echo $f[4];
                        echo $f[5]; */
                    ?>
					<a href="form-foto-edit.php?id=<?php echo $id;?>
					&&nome=<?php echo $f[2];?>
					&&email=<?php echo $f[3];?>
					&&telefone=<?php echo $f[4];?>" class="link">
					<img src="<?php echo "repositorio/".$f['url_img'];?>" alt="foto-perfil" class="avatarPerfil" style="width:200px;">
					<br>
                    <input type="text"class="readonly" name="id" value="<?php  echo "Cod:".$f['id'];?> " Placeholder="Codigo" readonly>
					<!-- <input type="file" name="url" value="<?php echo $_GET['url'];?>" style="margin: 0; width: 20%;"> --> 
					<input type="text" class="readonly" name="nome" value="<?php echo "Nome: ".$f['nome'];?>" required="required"> 
					<input type="email"class="readonly"  name="email" value="<?php echo "Email: ".$f['email'];?>"required="required" placeholder="Email" maxlength="50"> 
                    <input type="text" class="readonly" name="telefone" value="<?php echo "Telefone: ".$f['telefone'];?>" required="required" class="telefone" placeholder="DDD-Telefone" />
                    <input type="text" class="readonly" name="telefone" value="<?php echo "Telefone2: ".$f['numero'];?>" required="required" class="telefone" placeholder="DDD-Telefone" /> 
					<br>
					<!-- <button type="Submit" class="btn btn-success" name="salvar">Salvar</button> -->
					<a class="btn btn-primary" href="index.php" >Voltar</a>
					
				</form>
			</div>
			<!-- End Content -->
		</div>
	</div>
</body>
</html>