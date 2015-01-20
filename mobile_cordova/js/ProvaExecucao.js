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
		alert("recarrega");
		//$.mobile.changePage( "responder.html", { transition: "slide", changeHash: false });
		//$.mobile.loadPage( "responder.html");
		
		$.mobile.changePage(
			    window.location.href,
			    {
			      allowSamePageTransition : true,
			      transition              : 'slide',
			      showLoadMsg             : false,
			      reloadPage              : false
			    }
			  );

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
	

	function proximaIndice(){
		alert("proximo");
		alert(questaoSelecionadaIndex);
		var novoIndice = questaoSelecionadaIndex;
		novoIndice++;
		if(novoIndice < getQuestaoCount()){
			questaoSelecionadaIndex = novoIndice;
		}else{
			questaoSelecionadaIndex = 0;	
		}
		alert(questaoSelecionadaIndex);
	}
	
	function anteriorIndice(){
		alert(questaoSelecionadaIndex);
		var novoIndice = questaoSelecionadaIndex;
		novoIndice--;
		if(novoIndice >= 0){
			
			questaoSelecionadaIndex = novoIndice;
		}else{
		questaoSelecionadaIndex = getQuestaoCount() - 1;
		}
		alert(questaoSelecionadaIndex);
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
	alert("cria");
	ProvaExecucaoController.init();

});
