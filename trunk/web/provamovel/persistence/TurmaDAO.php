<?php
class TurmaDAO extends AbstractDAO{

	private $usuarioDAO;


	public function __construct(){

		$this->setConn( new ConnectionMySQLPDO());

		$this->setTableName("tb_turma");

		$this->usuarioDAO = new UsuarioDAO();
	}

	public function mapear($obj){
		
		$array = $obj->toArray();
		
		if($obj->getAutor()!=null){
		$array['autor'] = $obj->getAutor()->getId();
		}
		unset($array['provas']);
		unset($array['membros']);
		
		return $array;
	}

	public function validarTipo($obj){
		return $obj instanceof Turma;

	}

	public function validarTipoPesquisa($obj){
		return $obj instanceof TurmaPesquisa;

	}

	public function criarObjeto($array){
		$array['autor'] = $this->usuarioDAO->buscar(new Usuario($array['autor']));
		$array['membros'] = array();
		$array['provas'] = array();
		return Turma::construct($array);

	}

}