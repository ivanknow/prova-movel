<?php
class ProvaDAO extends AbstractDAO{

	private $turmaDAO;

	public function __construct(){

		$this->setConn( new ConnectionMySQLPDO());

		$this->setTableName("tb_prova");
		
		$this->turmaDAO = new TurmaDAO();

	}

	public function mapear($obj){
		Console::log("Titulo em mapear:".$obj->getTitulo());
		$array = $obj->toArray();
		if($obj->getAutor()!=null){
			$array['autor'] = $obj->getAutor()->getId();
		}
		
		if($obj->getTurma()!=null){
			$array['turma'] = $obj->getTurma()->getId();
		}
		
		unset($array['questoes']);
		
		return $array;

	}

	public function validarTipo($obj){
		return $obj instanceof Prova;

	}

	public function validarTipoPesquisa($obj){
		return $obj instanceof ProvaPesquisa;

	}

	public function criarObjeto($array){
		if($array['turma']!=null){
		$turma = $this->turmaDAO->buscar(new Turma($array['turma']));
		$array['turma'] = $turma;
		$array['autor'] = $turma->getAutor();
		}
		
		$array['questoes'] = array();
		
		return Prova::construct($array);

	}

}