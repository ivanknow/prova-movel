<?php
function menuLateral($arrayItens) {
	?>

<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar"
	role="navigation">
	<div class="list-group">
	 <?php
	for($i = 0; $i < count ( $arrayItens ); $i ++) {
	?>
       <a class="list-group-item" href="<?php echo $arrayItens[$i]['link']; ?>"><?php echo $arrayItens[$i]['titulo']; ?></a>
				<?php
	}
	?>
	</div>
</div>
<!--/span-->
<?php
}
?>