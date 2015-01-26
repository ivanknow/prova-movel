ProvaExecucaoController = function() {
	var provaSelecionada = null;
	var questaoSelecionadaIndex = 0;

	function getQuestaoAtual() {
		return ProvaExecucaoController.provaSelecionada.questoes[questaoSelecionadaIndex];
	}

	function getQuestaoCount() {
		return ProvaExecucaoController.provaSelecionada.questoes.length;
	}

	function init() {

		$("#btnNext").click(function() {
			atualizaRespostaQuestaoAtual();
			proximaIndice();
			recarregarPagina();
		});

		$("#btnAnt").click(function() {
			atualizaRespostaQuestaoAtual();
			anteriorIndice();
			recarregarPagina();
		});

		carregaQuestaoTela();
	}
	function recarregarPagina() {

		$.mobile.changePage(window.location.href, {
			allowSamePageTransition : true,
			transition : 'slide',
			showLoadMsg : false,
			reloadPage : false
		});
		carregaQuestaoTela();
	}

	function atualizaRespostaQuestaoAtual(){

		var questao = getQuestaoAtual();
		
		switch (questao.tipo) {
		case 0: // aberto
			questao.resposta = $("#fieldRespostaAberta").val();
			break;
		case 1: // fechada
			questao.resposta = $("input[type='radio']:checked").val();
			break;
		}

	}
	
	function carregaQuestaoTela() {
		var questao = getQuestaoAtual();
		$('#questaoEnunciado').html(questao.enunciado);

		$(".divResposta").each(function() {
			$(this).hide();
		});
		
		switch (questao.tipo) {
		case 0: // aberto
			// mostra aberta
			$("#fieldRespostaAberta").show();
			break;

		case 1: // fechada
			$("#fieldRespostaFechada").html("");
			var snippetItem = Snippets
					.getSnippet('snippet-item-resposta-fechada');
			var snippetItemLabel = Snippets
					.getSnippet('snippet-item-resposta-fechada-label');
			var html = "";
			for (var t = 0; t < questao.alternativas.length; t++) {
				html += snippetItem.updateAttr("id", t).updateAttr("value", t)
						.show();
				html += snippetItemLabel.updateAttr("for", t).content(
						questao.alternativas[t]).show();
			}
			$("#fieldRespostaFechada").html(html);
			$("input[type='radio']").checkboxradio();
			$("input[type='radio']").checkboxradio("refresh");
			// mostra fechada
			$("#fieldRespostaFechada").show();
			break;
		}
	}

	function proximaIndice() {
		var novoIndice = questaoSelecionadaIndex;
		novoIndice++;
		if (novoIndice < getQuestaoCount()) {
			questaoSelecionadaIndex = novoIndice;
		} else {
			questaoSelecionadaIndex = 0;
		}
	}

	function anteriorIndice() {
		var novoIndice = questaoSelecionadaIndex;
		novoIndice--;
		if (novoIndice >= 0) {

			questaoSelecionadaIndex = novoIndice;
		} else {
			questaoSelecionadaIndex = getQuestaoCount() - 1;
		}
	}
	return {
		init : init,
		provaSelecionada : provaSelecionada,
		getQuestaoAtual : getQuestaoAtual,
		anteriorIndice : anteriorIndice,
		proximaIndice : proximaIndice,
		questaoSelecionadaIndex : questaoSelecionadaIndex
	};
}();

$(document).on("pagebeforecreate", "#responder", function() {
	ProvaExecucaoController.init();

});
