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
					Cadastrar <b>Funcionário</b>
				</h2>

				<form action="#" method="post">
					<input type="hidden" name="Id" Placeholder="Codigo" readonly>
					<input type="file" name="imagem"  accept="image/png, image/jpeg" style="margin: 0; width: 40%;"/>
					<input type="text" name="nome" placeholder="Nome Completo" required="required" maxlength="35"> 
					<input type="email" name="email" placeholder="Email" required="required" maxlength="50"> 
<!-- 					<input type="text" name="telefone" placeholder="Telefone" required="required" maxlength="17"> -->
					<input type="text" name="telefone" class="telefone" placeholder="DDD-Telefone" />
									
					<input type="hidden" name="cpf" value="" placeholder="CPF" maxlength="11"> 
					<br>
					<button type="Submit" class="btn btn-success">Cadastrar</button>
				</form>
			</div>
			<!-- End Content -->
		</div>
	</div>
</body>
</html>