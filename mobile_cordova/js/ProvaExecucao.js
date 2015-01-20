var ProvaExecucaoController = function(){
	var provaSelecionada = null;
	var questaoSelecionadaIndex = 0
	
	function getQuestaoAtual(){
		return ProvaExecucaoController.provaSelecionada.questoes[questaoSelecionadaIndex];
	}
	
	function getQuestaoCount(){
		return ProvaExecucaoController.provaSelecionada.questoes.length;
	}	
	
	function init(){
		alert("init");
		$("#btnNext").click(function(){
			alert("proximo");
			proximaIndice();
			recarregarPagina();
		});
		
		$("#btnAnt").click(function(){
			alert("anterior");
			anteriorIndice();
			recarregarPagina();
		});
		
		carregaQuestaoTela();
	}
	function recarregarPagina(){
		$.mobile.changePage( "responder.html", { transition: "slide", changeHash: false });
	}
	
	function proximaIndice(){
		var novoIndice = questaoSelecionadaIndex;
		novoIndice++;
		if(novoIndice < getQuestaoCount()){
			questaoSelecionadaIndex = novoIndice;
		}
		questaoSelecionadaIndex = 0;
	}
	
	function carregaQuestaoTela(){
		var questao = getQuestaoAtual();
		$('#questaoEnunciado').html(questao.enunciado);
		
		$(".divResposta").each(function() {
			$(this).hide();
		});
		
		switch(questao.tipo){
		case 0: // aberto
			//mostra aberta
			$("#fieldRespostaAberta").show();
		break;
		
		case 1: // fechada
			//mostra fechada
			$("#fieldRespostaFechada").show();
		break;
		}
	}
	
	function anteriorIndice(){
		var novoIndice = questaoSelecionadaIndex;
		novoIndice--;
		if(novoIndice >= 0){
			questaoSelecionadaIndex = novoIndice;
		}
		questaoSelecionadaIndex = getQuestaoCount() - 1;
	} 
	return {
		init:init,
		provaSelecionada:provaSelecionada,
		getQuestaoAtual:getQuestaoAtual,
		anteriorIndice:anteriorIndice,
		proximaIndice:proximaIndice,
		questaoSelecionadaIndex:questaoSelecionadaIndex
	};
}();



$(document).on("pagebeforecreate", "#responder", function() {
	alert("criou");
	ProvaExecucaoController.init();

});
