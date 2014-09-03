<?php
/*

Usuario(id,email,senha)

Turma(id,autor,titulo,membros,tests)

Test(id,turma,titulo,qtdQuest�es,autor,tipo(publico ou privado(publico com link direto, privado com turma)),publicado ou rascunho,questoes)

Quest�o(id,test,enunciado,respostaTexto,op��es,respostaOp��es,tipo(abertas ou fechadas))

RespostaTest(id,usuario,test,respostas,nota)

RespostaQuest�o(id,quest�o,respostaTexto,respostaOpcao)

* */
class DefaultFacade extends AbstractFacade {
	public function __construct() {
		parent::__construct ();
		$this->setController ( new ExampleController () );
	}
	public function SAY_HI($array) {
		return array (
				"msg" => "Hi" 
		);
	}
	public function SAY_HELLO($array) {
		return array (
				"msg" => "Hello," . $array ['name'] 
		);
	}
	public function SAY_HELLO_CONT($array) {
		return array (
				"msg" => $this->getController ()->sayHelloController ( $array ['name'] ) 
		);
	}
	public function INSERIR_PESSOA($array) {
		$pessoa = Pessoa::construct ( $array );
		
		if ($this->getController ()->inserir ( $pessoa )) {
			
			return array (
					"msg" => "Inserido com sucesso" 
			);
		} else {
			return array (
					"msg" => "error" 
			);
		}
	}
}
?>