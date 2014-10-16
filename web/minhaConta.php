<!DOCTYPE html>
<html lang="en">
<head>

<title>Prova Movel</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/offcanvas.css" rel="stylesheet">

</head>

<body>

  	<?php
			include_once 'menu_superior.php';
			menuSuperior ( "Prova Movel", array (
					array (
							"titulo" => "Configurar",
							"link" => "configurar.php" 
					),
					array (
							"titulo" => "Sair",
							"link" => "sair.php" 
					) 
			) );
			?>

    <div class="container">

		<div class="row row-offcanvas row-offcanvas-right">

			<div class="col-xs-12 col-sm-9">
				<p class="pull-right visible-xs">
					<button type="button" class="btn btn-primary btn-xs"
						data-toggle="offcanvas">Toggle nav</button>
				</p>
				<div class="jumbotron">
					<h1>Seja Bem-Vindo</h1>
					<p>Esse &eacute; o sistema de provas online. Selecione abaixo a
						prova que voce deseja realizar</p>
				</div>
				<div class="row">
					 <?php
	
       					include 'mostra_prova.php';
       					$prova = array(
						"titulo" => "Minhas Provas",
						"descricao" => "minhasProvas.php");
						mostraProva($prova);
						mostraProva($prova);mostraProva($prova);mostraProva($prova);mostraProva($prova);
						mostraProva($prova);mostraProva($prova);mostraProva($prova);mostraProva($prova);
       				?>
				</div>
				<!--/row-->
			</div>
			<!--/span-->

       <?php

       include 'menu_lateral.php';
		$param = array (
				array (
						"titulo" => "Minhas Provas",
						"link" => "minhasProvas.php" 
				),
				array (
						"titulo" => "Cadastrar Provas",
						"link" => "cadastrarProvas.php" 
				),
				array (
						"titulo" => "Minha Conta",
						"link" => "minhasConta.php" 
				) 
		);
		menuLateral ($param);
		?>
      </div>
		<!--/row-->

		<hr>

		<footer>
			<p>&copy; Company 2014</p>
		</footer>

	</div>
	<!--/.container-->



	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/offcanvas.js"></script>
</body>
</html>
