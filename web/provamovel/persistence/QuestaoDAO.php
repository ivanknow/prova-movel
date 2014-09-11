<?php
class QuestaoDAO extends AbstractDAO{

private $opcaoDAO;

	public function __construct(){

		$this->setConn( new ConnectionMySQLPDO());

		$this->setTableName("tb_questao");

		$this->opcaoDAO = new OpcaoDAO();
	}

	public function mapear($obj){
		$array = $obj->toArray();
		unset($array['opcoes']);
		if($obj->getProva()!=null){
			$array['prova'] = $obj->getProva()->getId();
		}
		
		if($obj instanceof  QuestaoFechada && $obj->getOpcaoResposta()!=null){
			$array['opcaoResposta'] = $obj->getOpcaoResposta()->getId();
		}
		return $array;
	}

	public function validarTipo($obj){
		return $obj instanceof Questao;

	}

	public function validarTipoPesquisa($obj){
		return $obj instanceof QuestaoPesquisa;

	}

	public function criarObjeto($array){
		$array['prova'] = null;
		if ($array['tipo']=='aberta'){
			return QuestaoAberta::construct($array);
		}else{
			$obj = QuestaoFechada::construct($array);
			
			return $obj;
		}
		

	}
	
	public function inserir($obj){
		$id = parent::inserir($obj);
		
		if($obj instanceof QuestaoFechada){
			foreach ($obj->getOpcoes() as $opcao){
				$opcao->setQuestao(new Questao($obj->getId()));
				Console::log("Opa");
			}
			foreach ($obj->getOpcoes() as $opcao){
				$this->opcaoDAO->inserir($opcao);
				Console::log("insere opcao ".$opcao->getId());
			}
			
		}
	}

}