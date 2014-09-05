<?php
class ProvaDAO extends AbstractDAO{



	public function __construct(){

		$this->setConn( new ConnectionMySQLPDO());

		$this->setTableName("tb_prova");

	}

	public function mapear($obj){
		$array = $obj->toArray();
		return $array;

	}

	public function validarTipo($obj){
		return $obj instanceof Prova;

	}

	public function validarTipoPesquisa($obj){
		return $obj instanceof ProvaPesquisa;

	}

	public function criarObjeto($array){
		return Prova::construct($array);

	}

}