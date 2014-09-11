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
			$obj->setOpcoes($this->opcaoDAO->buscarTodos(new Opcao(0,null,$obj)));
			return $obj;
		}
	
	}
	
	public function inserir($obj){
		//primeiro eu insiro a questão para que eu tenha um id para relacionar
		
		$obj->setId(parent::inserir($obj));
		
		if($obj instanceof QuestaoFechada){
			$this->inserirOpcoes($obj);
		}
	}
	
	private function apagarDependencias($questao){
		if ($questao->getId()==0) {
				
			throw new Exception("Object ID cannot be '0' in a relactional operation.You need update the object id");
		}else{
		
			$result = $this->opcaoDAO->buscarTodos(new Opcao(0,null,$questao));
		
			foreach ($result as $opcao){
				$this->opcaoDAO->apagar($opcao);
			}
		}
	}
	
	private function inserirOpcoes(QuestaoFechada $questao){
		
		foreach ($questao->getOpcoes() as $opcao){
		
			$opcao->setQuestao(new Questao($questao->getId()));
		
			$id = $this->opcaoDAO->inserir($opcao);
		
		if($opcao->equals($questao->getOpcaoResposta())){

			$questao->setOpcaoResposta(new Opcao($id));
		}
				
		}
		
		$this->atualizar($questao);
	}


}