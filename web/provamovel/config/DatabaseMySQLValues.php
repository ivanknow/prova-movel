<?php

class DatabaseMySQLValues extends Values{
	public function loadValues(){
		$this->addValue("database","provamovel");
		$this->addValue("user","root");
		$this->addValue("password","");
		$this->addValue("host","localhost");
		$this->addValue("port","3306");
	}
}

?>