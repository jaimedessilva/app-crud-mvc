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
					Atualizar <b>Funcionário</b>
				</h2>
				<form action="controller/funcionario-controller.php" method="post" enctype="multipart/form-data">
					<input type="text" name="Id" value="<?php echo $_GET['id'];?> " Placeholder="Codigo" readonly>
					<input type="file" name="url" value="<?php echo $_GET['url'];?>" style="margin: 0; width: 20%;"> 
					<input type="text" name="nome" value="<?php echo $_GET['nome'];?>" required="required" > 
					<input type="email" name="email" value="<?php echo $_GET['email'];?>"required="required" placeholder="Email" maxlength="50"> 
					<input type="text" name="telefone" value="<?php echo $_GET['telefone'];?>" required="required" class="telefone" placeholder="DDD-Telefone" /> 
					<br>
                    <button type="Submit" class="btn btn-success" name="salvar">Salvar</button>
                    <input href="#" type="button" class="btn btn-primary" name="cadastrar" value="+Telefone">
				</form>
			</div>
			<!-- End Content -->
		</div>
	</div>
</body>
</html>