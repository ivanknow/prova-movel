<?php
class QuestaoAberta extends Questao{

	private $respostaTexto;
	public function __construct($id=0,$enunciado= "",$prova= null,$tipo = 0,$respostaTexto = ""){
		parent::__construct($id=0,$enunciado= "",$prova= null,$tipo = 0);
		$this->respostaTexto = $respostaTexto;
	}

	public static function construct($array){
		
		$obj = new QuestaoAberta();
		$this->setId($id);
		$obj->setProva( $array['prova']);
		$obj->setEnunciado( $array['enunciado']);
		$obj->setTipo( $array['tipo']);
		
		$obj->setRespostaTexto( $array['respostaTexto']);
		return $obj;

	}

	public function getRespostaTexto(){
		return $this->respostaTexto;
	}

	public function setRespostaTexto($respostaTexto){
		$this->respostaTexto=$respostaTexto;
	}
	public function equals($object){
		if($object instanceof QuestaoAberta){

			if($this->respostaTexto!=$object->respostaTexto){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return "  [respostaTexto:" .$this->respostaTexto. "]  " ;
	}

}