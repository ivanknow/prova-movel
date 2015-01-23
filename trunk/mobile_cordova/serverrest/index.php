<?php
date_default_timezone_set ( "America/Recife" );

include 'Slim/Slim.php';
\Slim\Slim::registerAutoloader ();
$app = new \Slim\Slim ();
$app->post ( '/prova/', 'getAllProva' );
$app->post ( '/prova/:id', 'getProvaById' );
$app->get ( '/prova/:id', 'getProvaById' );

$app->run ();
function getAllProva() {
	$retorno = array (
			"items" => array (
					array (
							"titulo" => "Prova 1",
							"id" => "1" 
					),
					array (
							"titulo" => "Prova 2",
							"id" => "2" 
					),
					array (
							"titulo" => "Prova 3",
							"id" => "3" 
					) 
			)
			 
	);
	
	echo json_encode ( $retorno );
}
function getProvaById($id) {
	$retorno = array (
			"item" => array (
					"titulo" => "Prova 1",
					"id" => "1",
					"count" => "15",
					"data" => "15/02/2015",
					"autor" => "Gilberto",
					"questoes" => array (
							array (
									"enunciado" => "Qual eh a cor?","tipo"=>1,
									alternativas => array("Azul","Amarelo","Verde","Vermelho")
							),
							array (
									"enunciado" => "Porque tem cor?","tipo"=>0 
							),
							array (
									"enunciado" => "Onde a cor fica visivel?","tipo"=>0, 
							) 
					) 
			)
			 
	);
	
	echo json_encode ( $retorno );
}
?>