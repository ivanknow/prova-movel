<?php
class OpcaoDAO extends AbstractDAO{



	public function __construct(){

		$this->setConn( new ConnectionMySQLPDO());

		$this->setTableName("tb_opcao");

	}

	public function mapear($obj){
		$array = $obj->toArray();
		
		if($obj->getQuestao()!=null){
			$array['questao'] = $obj->getQuestao()->getId();
		}
		return $array;

	}

	public function validarTipo($obj){
		return $obj instanceof Opcao;

	}

	public function validarTipoPesquisa($obj){
		return false;

	}

	public function criarObjeto($array){
		$array['questao'] = null;
		return Opcao::construct($array);

	}

}