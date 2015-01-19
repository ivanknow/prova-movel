<?php
date_default_timezone_set ( "America/Recife" );

include 'Slim/Slim.php';
\Slim\Slim::registerAutoloader ();
$app = new \Slim\Slim ();
$app->post ( '/prova/', 'getAllProva' );
$app->post ( '/prova/:id', 'getProvaById' );

$app->run ();
function getAllProva() {
	$retorno =array("items"=> array (
			array (
					"titulo" => "Prova 1",
					"id" => "1",
					
			),array (
					"titulo" => "Prova 2",
					"id" => "2",
					
			),array (
					"titulo" => "Prova 3",
					"id" => "3",
					
			)
	));
	
	echo json_encode ( $retorno );
}
function getProvaById($id) {
	$retorno = array (
					"titulo" => "Prova 1",
					"id" => "1",
					"count" => "15",
					"autor" => "Gilberto",
					"questoes" => array(
					array("enunciado"=>"Qual é a cor?"),
					array("enunciado"=>"Porque tem cor?"),
					array("enunciado"=>"Onde a cor fica visivel?")
					
					)
					
			
	);
	
	echo json_encode ( $retorno );
}
?>