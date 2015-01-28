<?php
date_default_timezone_set ( "America/Recife" );

include 'Slim/Slim.php';
\Slim\Slim::registerAutoloader ();
$app = new \Slim\Slim ();
$app->post ( '/prova/', 'getAllProva' );
$app->post ( '/prova/:id', 'getProvaById' );
//$app->get ( '/prova/:id', 'getProvaById' );
$app->post ( '/login/', 'login' );
$app->post ( '/finalizar/', 'finalizarProva' );

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
					"titulo" => "Prova "+$id,
					"id" => "1",
					"count" => "15",
					"data" => "15/02/2015",
					"autor" => "Gilberto",
					"questoes" => array (
							array (
									"enunciado" => "Qual eh a cor?","tipo"=>1,
									"alternativas" => array("Azul","Amarelo","Verde","Vermelho")
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

function login() {
	$email = $_POST['login'];
	$password = $_POST['password'];
	//fazer busca
		if($email == "ivanknow@gmail.com" && $password == "123456"){
	//salva hash no banco
			$hash = sha1($email.$password);
	//retorna hash
			$retorno = array("hash"=>$hash,"error"=>0);
		}else{
			$retorno = array("error"=>1,"errorMessage"=>"Erro no login, verifique seus dados");
		}
	echo json_encode ( $retorno );
}

function finalizarProva() {
	$email = $_POST['login'];
	$hash = $_POST['hash'];
	$respostas = $_POST['respostas'];
	//$respostaString = json_decode($_POST['respostas']);
	if($email == "ivanknow@gmail.com"){//comparar hash
		$string = "user:"+$email;

		foreach ($respostas as $key => $value) {
			$string .= $key.":".json_encode($value)."," ;
		}
		
		$retorno = array("error"=>0,"string"=>$string);
	}else{
		$retorno = array("error"=>1,"errorMessage"=>"Erro");
	}
	echo json_encode ( $retorno );
}
?>