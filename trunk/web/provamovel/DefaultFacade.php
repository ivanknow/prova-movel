<?php
/*

Usuario(id,email,senha)

Turma(id,autor,titulo,membros,tests)

Test(id,turma,titulo,qtdQuest�es,autor,tipo(publico ou privado(publico com link direto, privado com turma)),publicado ou rascunho,questoes,data_criacao)

Quest�o(id,test,enunciado,respostaTexto,op��es,respostaOp��es,tipo(abertas ou fechadas))

RespostaTest(id,usuario,test,respostas,nota)

RespostaQuest�o(id,quest�o,respostaTexto,respostaOpcao)

* */
class DefaultFacade extends AbstractFacade {
	public function __construct() {
		parent::__construct ();
		$this->setController ( new ExampleController () );
	}
//GERAL
	public function CADASTRAR($array) {
		return array();
	}
	public function LOGIN($array) {
		return array();
	}
	public function LOGOUT($array) {
		return array();
	}
//PROFESSOR
	public function CADASTRAR_PROVA($array) {
		return array();
	}
	public function SALVAR_PROVA($array) {
		return array();
	}
	public function APAGAR_PROVA($array) {
		return array();
	}
	public function EDITAR_PROVA($array) {
		return array();
	}
	public function ADD_QUESTAO($array) {
		return array();
	}
	public function APAGAR_QUESTAO($array) {
		return array();
	}
	//ALUNO
	public function INICIAR_PROVA($array) {
		return array();
	}
	public function INICIAR_PROVA($array) {
		return array();
	}
	public function RESPONDER_QUESTAO($array) {
		return array();
	}
}
?>