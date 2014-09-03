<?php
class ModuleConfigTest extends PHPUnit_Framework_TestCase {
	
	public function testPushAndPop() {
		ValuesConfig::initialize("provamovel");
		

		$this->assertEquals (3,count(ValuesConfig::getValues()));
		$this->assertEquals ("root", ValuesConfig::getValue("DatabaseValues","user"));
	}
}