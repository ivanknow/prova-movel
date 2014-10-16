<?php
function mostraProva($prova) {
	?>
<div class="col-6 col-sm-6 col-lg-4">
	<h2><?php echo $prova['titulo'] ?></h2>
	<p><?php echo $prova['descricao'] ?></p>
	<p>
		<a class="btn btn-default" href="#" role="button">Fazer Prova &raquo;</a>
	</p>
</div>
<!--/span-->
<?php
}
?>
