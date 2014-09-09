<?php
class QuestaoFechada extends Questao{

	private $opcoes;
	private $opcaoResposta;
	public function __construct($id=0,$enunciado= "",$prova= null,$tipo = 0,$opcoes= array(),$opcaoResposta= null){
		
		$this->opcoes = $opcoes;
		$this->opcaoResposta = $opcaoResposta;
		parent::__construct($id,$enunciado,$prova,$tipo);
	}

	public static function construct($array){
		$obj = new QuestaoFechada();
		
		$this->setId($id);
		$obj->setProva( $array['prova']);
		$obj->setEnunciado( $array['enunciado']);
		$obj->setTipo( $array['tipo']);
		
		$obj->setOpcoes( $array['opcoes']);
		$obj->setOpcaoResposta( $array['opcaoResposta']);
		return $obj;

	}

	public function getOpcoes(){
		return $this->opcoes;
	}

	public function setOpcoes($opcoes){
		$this->opcoes=$opcoes;
	}

	public function getOpcaoResposta(){
		return $this->opcaoResposta;
	}

	public function setOpcaoResposta($opcaoResposta){
		$this->opcaoResposta=$opcaoResposta;
	}
	public function equals($object){
		if($object instanceof QuestaoFechada){

			if($this->opcoes!=$object->opcoes){
				return false;

			}

			if($this->opcaoResposta!=$object->opcaoResposta){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return "  [opcoes:" .$this->opcoes. "]  [opcaoResposta:" .$this->opcaoResposta. "]  " ;
	}

}