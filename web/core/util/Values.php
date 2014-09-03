<?php
abstract class Values{

	private $values;
	public function __construct()
	{
		$this->values = array();
		$this->loadValues();
	}
	
	abstract public function loadValues();
	
	public function addValue($chave,$valor){
	if (array_key_exists($chave,$this->values)) {
  		throw new Exception("This key '$chave' already is in use");
  	}
	else{
		$this->values[$chave] = $valor;
  	}
	
	}
	
	public function getValue($chave){
		return $this->values[$chave];
	}
	
}

?>