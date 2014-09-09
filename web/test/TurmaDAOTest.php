<?php
class TurmaDAOTest extends PHPUnit_Framework_TestCase {

	public function testInsert() {
		$usuario = new Usuario();
		$usuario->setId(3);
		$usuario->setEmail("ivan@gmail.com");
		$usuario->setSenha("123456");
		
		$turma = new Turma(1,$usuario,"Programacao Web");
		
		$DAO = new TurmaDAO();
		
		/*print_r($DAO->mapear($turma));*/
		
		$id = $DAO->inserir($turma);
		
		$turmaTemp = new Turma($id);

		$result = $DAO->buscarTodos($turmaTemp);

		$this->assertEquals (1,count($result));

		$this->assertEquals($turma->getId(),$result[0]->getId());

		$this->assertEquals($turma->getTitulo(),$result[0]->getTitulo());
	}

	public function testUpdate() {
		$DAO = new TurmaDAO();
		$turmaTemp = new Turma(1);
		
		$result = $DAO->buscar($turmaTemp);
		
		$this->assertEquals(1,$result->getId());
		
		$result->setTitulo("Alterado");
		
		$DAO->atualizar($result);
		
		$result2 = $DAO->buscar($turmaTemp);
		
		$this->assertEquals($result->getTitulo(),$result2->getTitulo());
		
	}

	public function testDelete() {
		$DAO = new TurmaDAO();
		$turmaTemp = new Turma(1);
		
		$result = $DAO->buscar($turmaTemp);
		
		$this->assertEquals(1,$result->getId());
		
		
		$DAO->apagar($result);
		
		$result2 = $DAO->buscarTodos($turmaTemp);
		
		$this->assertEquals(0,count($result2));
	}
}