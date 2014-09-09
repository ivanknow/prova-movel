<?php
class TurmaDAOTest extends PHPUnit_Framework_TestCase {

	public function testInsert() {
		Console::reset();
		Console::log("Iniciou teste");
		$dao = new ProvaDAO();
		
		$usuario = new Usuario();
		$usuario->setId(3);
		$usuario->setEmail("ivan@gmail.com");
		$usuario->setSenha("123456");
		
		$turma = new Turma(1,$usuario,"Programacao Web");
		
		$prova = new Prova(1,"Teste",$turma,$usuario,false,array());

		$id = $dao->inserir($prova);
		
		$provaTemp = new Prova($id);
		
		$result = $dao->buscarTodos($provaTemp);
		
		$this->assertEquals (1,count($result));
		
		$this->assertEquals($prova->getId(),$result[0]->getId());
		Console::log("Titulo:".$result[0]->getTitulo());
		$this->assertEquals("Teste",$result[0]->getTitulo());
		
		Console::log("Finalizou teste");
	}

	public function testUpdate() {
			
	}

	public function testDelete() {
		
	}
}