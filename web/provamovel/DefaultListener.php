<?php
date_default_timezone_set("America/Recife");

include '../core/util/ModuleConfig.php';

$conf = new ModuleConfig("provamovel",array("core"));

if(!isset($_REQUEST['opt'])){
	die("{\"error\":1,\"msgError\":\"".ValuesConfig::getValue("StringValues","acesso_indevido")."\"}");

}else{

	$entrada = $_REQUEST;
	$fachada = new DefaultFacade();
	try {
		echo json_encode($conf->callMethod($entrada, $fachada));

	} catch (Exception $e) {
		$msg = $e->getMessage();

		echo "{\"error\":1,\"msgError\":\"$msg\"}";

	}

}

?>