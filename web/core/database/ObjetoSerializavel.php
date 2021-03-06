<?php

abstract class ObjetoSerializavel {

	public function __construct(){
	
	}

	public function toArray(){
	
		$temp = (array) $this;
	
		$array = array();
	
		foreach ($temp as $k => $v) {
			$k = preg_match('/^\x00(?:.*?)\x00(.+)/', $k, $matches) ? $matches[1] : $k;
			if(is_object($v)){
				if($v instanceof ObjetoSerializavel){
					$array[$k] = $v->toArray();
				}else{
				$array[$k] = $v;
				}	
			}else{
			$array[$k] = $v;
			}
		}
	
		return  $array;
	}

}

?>