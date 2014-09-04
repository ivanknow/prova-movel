<?php
class UsuarioDAO extends AbstractDAO{



	public function __construct(){
		$this->setConn( new ConnectionMySQLPDO());
		$this->setTableName("tb_usuario");

	}

	public function mapear($obj){
		$array = $obj->toArray(); 
		return $array;
		
	}

	public function validarTipo($obj){
		return $obj instanceof Usuario;

	}

	public function validarTipoPesquisa($obj){
		return $obj instanceof UsuarioPesquisa;

	}

	public function criarObjeto($array){
		return Usuario::construct($array);
	}

}