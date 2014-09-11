<?php
class QuestaoDAOTest extends PHPUnit_Framework_TestCase {

	public function testInsertAberta() {
		//QuestaoAberta::__construct($id, $enunciado, $prova, $tipo, $respostaTexto
		Console::reset();
		$prova = new Prova(1);
		$questao = new QuestaoAberta(1,"Voce gosta de agua?",$prova,1,"Tem gente que gosta e tem gente que não");
		
		$dao = new QuestaoDAO();
		
		$id = $dao->inserir($questao);
		
		$questaoTemp = new Questao(1);
		
		$result = $dao->buscarTodos($questaoTemp);
		
		$this->assertEquals (1,count($result));
		$this->assertTrue ($result[0] instanceof QuestaoAberta);
		
	}
	
	public function testInsertFechada() {
	
	
		$opcao1 = new Opcao(0,"Azul");
		$opcao2 = new Opcao(0,"Vermelho");
		
		$prova = new Prova(1);
		//QuestaoFechada::__construct($id, $enunciado, $prova, $tipo, $opcoes, $opcaoResposta) 
		$questao = new QuestaoFechada(2,"Qual é sua cor preferida?",$prova,2,array($opcao1,$opcao2),$opcao1);
		
		$dao = new QuestaoDAO();
		
		$id = $dao->inserir($questao);
		
		$questaoTemp = new Questao(2);
		
		$result = $dao->buscarTodos($questaoTemp);
		
		$this->assertEquals (1,count($result));
		$this->assertTrue ($result[0] instanceof QuestaoFechada);
		//$this->assertTrue (2,count($result[0]->getOpcoes()));
		
	}


	public function testDelete() {

	/*	$dao = new OpcaoDAO();
		
		$opcaoTemp = new Opcao(1);
		
		$result = $dao->buscarTodos($opcaoTemp);
		
		$this->assertEquals (1,count($result));
		
		$dao->apagar($result[0]);
		
		$result = $dao->buscarTodos($opcaoTemp);
		
		$this->assertEquals (0,count($result));*/
		
	}
}