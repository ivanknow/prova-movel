<?php

class ValuesConfig{

	private static $values;
	private static $moduleName;
	private static $initialized = false;

	public static function getValues(){
		return self::$values;
	}

	
	public function getValue($objectName,$property){
		$values = self::$values;
		return $values[$objectName]->getValue($property);
	}
	
	
	 public static function initialize($moduleName)
	{
		if (self::$initialized)
			return;
		
		self::$moduleName = $moduleName;
		self::loadValues();
		self::$initialized = true;
	}

		
	public static function loadValues(){
		$listNames = self::getValuesList();
		foreach ($listNames as $name){
			$nameWithotExt = str_replace(".php","",$name);
			$class = new ReflectionClass($nameWithotExt);
			$instance = $class->newInstanceArgs();
			 
			self::$values[$nameWithotExt] = $instance;
			
		}
	}
	
	public static function getValuesList(){
		$array = array();
		if ($handle = opendir('../'.self::$moduleName.'/config')) {
			while (false !== ($file = readdir($handle)))
			{
				if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
				{
					$array[] = $file;
				}
			}
			closedir($handle);
		}
		return $array;
	}

}



?>