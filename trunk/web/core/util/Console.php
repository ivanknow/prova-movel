<?php
class Console{

	public static function log($text){
		file_put_contents("../log.txt","[".date('m/d/Y h:i:s a')."]".$text."\n",FILE_APPEND);
	}
	
	public static function reset(){
		file_put_contents("../log.txt","");
	}
}