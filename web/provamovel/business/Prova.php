<?php
class Prova extends ObjetoPersistente{

	private $titulo;
	private $turma;
	private $autor;
	private $publicada;
	private $questoes;
	private $data_criacao;
	
	public function __construct($id = 0,$titulo="",$turma= null,$autor= null,$publicada = 0,$questoes= array()){
		Console::log("Titulo no construtor:".$titulo);
		$this->setId($id);
		$this->titulo = $titulo;
		$this->turma = $turma;
		$this->autor = $autor;
		$this->publicada = $publicada;
		$this->questoes = $questoes;
	}

	public static function construct($array){
		$obj = new Prova();
		$obj->setId($array['id']);
		$obj->setTitulo( $array['titulo']);
		$obj->setTurma( $array['turma']);
		$obj->setAutor( $array['autor']);
		$obj->setPublicada( $array['publicada']);
		$obj->setQuestoes( $array['questoes']);
		return $obj;

	}

	public function getTitulo(){
		return $this->titulo;
	}
	
	public function setTitulo($titulo){
		$this->titulo=$titulo;
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
		return count($this->questoes);
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
	
	public function getDataCriacao(){
		return $this->data_criacao;
	}
	
	public function equals($object){
		if($object instanceof Prova){

			if($this->titulo!=$object->titulo){
				return false;
			
			}
			
			if(!$object->turma->equals($this->turma)){
				return false;

			}

			if(!$this->autor->equals($object->autor)){
				return false;

			}

			if($this->publicada!=$object->publicada){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return " [turma:" .$this->titulo. "] [turma:" .$this->turma. "]  [autor:" .$this->autor. "] [publicada:" .$this->publicada. "]   " ;
	}

}