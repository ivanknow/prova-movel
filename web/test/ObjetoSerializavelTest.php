<?php

class a extends ObjetoSerializavel{
	private $nome="Ivan";
	private $idade=26;
}

class b extends ObjetoSerializavel{
	private $nome="Micarlla";
	private $idade=25;
	private $namorado;
	
	public function __construct(){
		$this->namorado = new a();
	}
}
class ModuleConfigTest extends PHPUnit_Framework_TestCase {
	
	public function testPushAndPop() {
		
		$a = new a();
		$this->assertEquals ("Ivan",$a->toArray()['nome']);
		$this->assertEquals (26,$a->toArray()['idade']);
		
		$b = new b();

		$this->assertEquals ("Ivan",$b->toArray()['namorado']['nome']);
		$this->assertEquals (26,$b->toArray()['namorado']['idade']);
	}
}