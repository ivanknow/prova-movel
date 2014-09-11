<?php
class Questao extends ObjetoPersistente{

	private $prova;
	private $enunciado;
	private $tipo;
	public function __construct($id=0,$enunciado= "",$prova= null,$tipo = 0){
		$this->setId($id);
		$this->prova = $prova;
		$this->enunciado = $enunciado;
		$this->tipo = $tipo;

	}

	public static function construct($array){
		$obj = new Questao();
		$obj->setId($array['id']);
		$obj->setProva( $array['prova']);
		$obj->setEnunciado( $array['enunciado']);
		$obj->setTipo( $array['tipo']);
		return $obj;

	}

	public function getProva(){
		return $this->prova;
	}

	public function setProva($prova){
		$this->prova=$prova;
	}

	public function getEnunciado(){
		return $this->enunciado;
	}

	public function setEnunciado($enunciado){
		$this->enunciado=$enunciado;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo=$tipo;
	}
	public function equals($object){
		if($object instanceof Questao){

			if($this->prova!=$object->prova){
				return false;

			}

			if($this->enunciado!=$object->enunciado){
				return false;

			}

			if($this->tipo!=$object->tipo){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return "  [prova:" .$this->prova. "]  [enunciado:" .$this->enunciado. "]  [tipo:" .$this->tipo. "]  " ;
	}

}