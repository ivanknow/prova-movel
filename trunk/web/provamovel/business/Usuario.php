<?php
class Usuario extends ObjetoPersistente{

	private $email;
	private $senha;
	public function __construct($id = 0,$email= "" ,$senha= "" ){
		$this->setId($id);
		$this->email = $email;
		$this->senha = $senha;

	}

	public static function construct($array){
		$obj = new Usuario();
		$obj->setId( $array['id']);
		$obj->setEmail( $array['email']);
		$obj->setSenha( $array['senha']);
		return $obj;

	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email=$email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha=$senha;
	}
	public function equals($object){
		if($object instanceof Usuario){

			if($this->email!=$object->email){
				return false;

			}

			if($this->senha!=$object->senha){
				return false;

			}

			return true;

		}
		else{
			return false;
		}

	}
	public function toString(){

		return " [id:" .$this->id. "]   [email:" .$this->email. "]  [senha:" .$this->senha. "]  " ;
	}

}