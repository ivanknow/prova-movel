<?php
class Turma extends ObjetoPersistente{

	private $autor;
	private $titulo;
	private $membros;
	private $provas;
	public function __construct($id = 0,$autor= null,$titulo= "" ,$membros= array(),$provas= array()){
		$this->setId($id);
		$this->autor = $autor;
		$this->titulo = $titulo;
		$this->membros = $membros;
		$this->provas = $provas;

	}

	public static function construct($array){
		$obj = new Turma();
		$obj->setId( $array['id']);
		$obj->setAutor( $array['autor']);
		$obj->setTitulo( $array['titulo']);
		$obj->setMembros( $array['membros']);
		$obj->setProvas( $array['provas']);
		return $obj;

	}

	public function getAutor(){
		return $this->autor;
	}

	public function setAutor($autor){
		$this->autor=$autor;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo=$titulo;
	}

	public function getMembros(){
		return $this->membros;
	}

	public function setMembros($membros){
		$this->membros=$membros;
	}

	public function getProvas(){
		return $this->provas;
	}

	public function setProvas($provas){
		$this->provas=$provas;
	}
	public function equals($object){
		if($object instanceof Turma){

			if($this->autor!=$object->autor){
				return false;

			}

			if($this->titulo!=$object->titulo){
				return false;

			}

			if($this->membros!=$object->membros){
				return false;

			}

			if($this->provas!=$object->provas){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return "[id:" .$this->getId(). "]  [autor:" .$this->autor. "]  [titulo:" .$this->titulo. "]  [membros:" .$this->membros. "]  [provas:" .$this->provas. "]  " ;
	}

}