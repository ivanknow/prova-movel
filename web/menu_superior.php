<?php function menuSuperior($title,$arrayItens,$indexSelected=0){
	
?>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="index.php"><?php echo $title; ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php for ($i = 0; $i < count($arrayItens); $i++) {
          	
          		?>
          		<li><a   href=" <?php echo $arrayItens[$i]['link']; ?> "><?php echo $arrayItens[$i]['titulo']; ?></a></li>
				<?php           	
          	
          }?>
            
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

<?php
	
}


?>
