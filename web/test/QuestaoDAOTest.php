<?php
class TurmaDAOTest extends PHPUnit_Framework_TestCase {

	public function testInsertAberta() {
		
		$questaoFechada = new QuestaoFechada(1);
		
		$opcao = new Opcao(1,"Sim",$questaoFechada);
		
		$dao = new OpcaoDAO();
		
		$id = $dao->inserir($opcao);
		
		$opcaoTemp = new Opcao($id);
		
		$result = $dao->buscarTodos($opcaoTemp);
		
		$this->assertEquals (1,count($result));
		
	}
	
	public function testInsertFechada() {
	
		$questaoFechada = new QuestaoFechada(1);
	
		$opcao = new Opcao(1,"Sim",$questaoFechada);
	
		$dao = new OpcaoDAO();
	
		$id = $dao->inserir($opcao);
	
		$opcaoTemp = new Opcao($id);
	
		$result = $dao->buscarTodos($opcaoTemp);
	
		$this->assertEquals (1,count($result));
	
	}


	public function testDelete() {

		$dao = new OpcaoDAO();
		
		$opcaoTemp = new Opcao(1);
		
		$result = $dao->buscarTodos($opcaoTemp);
		
		$this->assertEquals (1,count($result));
		
		$dao->apagar($result[0]);
		
		$result = $dao->buscarTodos($opcaoTemp);
		
		$this->assertEquals (0,count($result));
		
	}
}