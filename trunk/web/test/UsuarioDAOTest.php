<?php
class UsuarioDAOTest extends PHPUnit_Framework_TestCase {

	public function testInsert() {
		$usuario = new Usuario();
		$usuario->setId(3);
		$usuario->setEmail("ivan@gmail.com");
		$usuario->setSenha("123456");
		
		$usuario2 = new Usuario();
		$usuario2->setId(4);
		$usuario2->setEmail("ivan2@gmail.com");
		$usuario2->setSenha("123456");
		
		$DAO = new UsuarioDAO();
		
		$DAO->inserir($usuario);
		
		$id = $DAO->inserir($usuario2);

		$usuarioTemp = new Usuario($usuario2->getId());

		$result = $DAO->buscarTodos($usuarioTemp);

		$this->assertEquals (1,count($result));

		$this->assertEquals($usuario2->getId(),$result[0]->getId());

		$this->assertEquals($usuario2->getEmail(),$result[0]->getEmail());
		

	}

	public function testUpdate() {

		/*$usuario = new Usuario();
		$usuario->setId(1);

		$DAO = new usuarioDAO();
		
		$resultUser = $DAO->buscar($usuario);
		$resultUser->setEmail("ivan@bol.com.br");
		
		$id = $DAO->atualizar($resultUser);

		$usuarioTemp = new Usuario($id);

		$result = $DAO->buscarTodos($usuarioTemp);

		$this->assertEquals (1,count($result));

		$this->assertEquals($id,$result[0]->getId());

		$this->assertEquals($usuario->getTitulo(),$result[0]->getTitulo());
*/
	}

	public function testDelete() {
	/*	$usuario = new Usuario();
		$usuario->setId(1);

		$DAO = new UsuarioDAO();
		$id = $DAO->apagar($usuario);

		$usuarioTemp = new Usuario($id);

		$result = $DAO->buscarTodos($usuarioTemp);

		$this->assertEquals (0,count($result));
*/
	}
}