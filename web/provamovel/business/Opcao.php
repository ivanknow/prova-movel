<?php
class Opcao extends ObjetoPersistente{

	private $texto;
	private $questao;
	
	public function __construct($id=0,$texto = "",$questao=null){
		$this->setId($id);
		$this->setQuestao($questao);
		$this->texto = $texto;
	}

	public static function construct($array){
		$obj = new Opcao();
		$obj->setId( $array['id']);
		$obj->setQuestao($array['questao']);
		$obj->setTexto( $array['texto']);
		return $obj;

	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto=$texto;
	}

	public function getQuestao(){
		return $this->questao;
	}
	
	public function setQuestao($questao){
		$this->questao=$questao;
	}

	public function equals($object){
		if($object instanceof Opcao){

			if($this->texto!=$object->texto){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return "  [texto:" .$this->texto. "]  " ;
	}

}