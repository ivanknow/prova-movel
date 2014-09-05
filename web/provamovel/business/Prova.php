<?php
class Prova extends ObjetoPersistente{

	private $turma;
	private $autor;
	private $numQuestao;
	private $tipo;
	private $publicada;
	private $questoes;
	public function __construct($id = 0,$turma= null,$autor= null,$numQuestao = 0,$tipo = 0,$publicada = 0,$questoes= array()){
		$this->setId($id);
		$this->turma = $turma;
		$this->autor = $autor;
		$this->numQuestao = $numQuestao;
		$this->tipo = $tipo;
		$this->publicada = $publicada;
		$this->questoes = $questoes;

	}

	public static function construct($array){
		$obj = new Prova();
		$obj->setTurma( $array['turma']);
		$obj->setAutor( $array['autor']);
		$obj->setNumQuestao( $array['numQuestao']);
		$obj->setTipo( $array['tipo']);
		$obj->setPublicada( $array['publicada']);
		$obj->setQuestoes( $array['questoes']);
		return $obj;

	}

	public function getTurma(){
		return $this->turma;
	}

	public function setTurma($turma){
		$this->turma=$turma;
	}

	public function getAutor(){
		return $this->autor;
	}

	public function setAutor($autor){
		$this->autor=$autor;
	}

	public function getNumQuestao(){
		return $this->numQuestao;
	}

	public function setNumQuestao($numQuestao){
		$this->numQuestao=$numQuestao;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo=$tipo;
	}

	public function getPublicada(){
		return $this->publicada;
	}

	public function setPublicada($publicada){
		$this->publicada=$publicada;
	}

	public function getQuestoes(){
		return $this->questoes;
	}

	public function setQuestoes($questoes){
		$this->questoes=$questoes;
	}
	public function equals($object){
		if($object instanceof Prova){

			if($this->turma!=$object->turma){
				return false;

			}

			if($this->autor!=$object->autor){
				return false;

			}

			if($this->numQuestao!=$object->numQuestao){
				return false;

			}

			if($this->tipo!=$object->tipo){
				return false;

			}

			if($this->publicada!=$object->publicada){
				return false;

			}

			if($this->questoes!=$object->questoes){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return "  [turma:" .$this->turma. "]  [autor:" .$this->autor. "]  [numQuestao:" .$this->numQuestao. "]  [tipo:" .$this->tipo. "]  [publicada:" .$this->publicada. "]  [questoes:" .$this->questoes. "]  " ;
	}

}