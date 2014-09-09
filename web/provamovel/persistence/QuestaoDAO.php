<?php
class QuestaoDAO extends AbstractDAO{



	public function __construct(){

		$this->setConn( new ConnectionMySQLPDO());

		$this->setTableName("tb_questao");

	}

	public function mapear($obj){
		$array = $obj->toArray();
		return $array;

	}

	public function validarTipo($obj){
		return $obj instanceof Questao;

	}

	public function validarTipoPesquisa($obj){
		return $obj instanceof QuestaoPesquisa;

	}

	public function criarObjeto($array){
		return Questao::construct($array);

	}

}