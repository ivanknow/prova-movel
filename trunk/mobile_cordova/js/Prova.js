var ProvaController = new Controller("prova", "linkProva", "", "attrid");

ProvaController.QuestaoSelecionadaIndex = 0;

ProvaController.setShowScreenList(function(items) {
	var html = "";
	for (t in items) {
		var link = HTMLMaker()
		.createTag("a")
		.attr("href", "iniciarprova.html")
		.attr("class", ProvaController.linkClass)
		.attr('data-transition', 'slide')
		.attr("attrid", items[t].id)
		.content(items[t].titulo);
		
		var linkIcon = HTMLMaker()
		.createTag("a")
		.attr('data-transition', 'slide')
		.attr("href","iniciarprova.html")
		.attr("class", ProvaController.linkClass)
		.attr("attrid", items[t].id)
		.content(items[t].titulo);
		
		html += HTMLMaker()
		.createTag("li")
		.content(link.show() + linkIcon.show())
		.show();
	}

	$("#divListaProva").html(html);
	$('#divListaProva').listview('refresh');


});

ProvaController.setShowItem(function(item) {
	$('#tableDadosProva  tr:last td:eq(0)').html(item.titulo);
	$('#tableDadosProva  tr:last td:eq(1)').html(item.autor);
	$('#tableDadosProva  tr:last td:eq(2)').html(item.data);
	$('#tableDadosProva  tr:last td:eq(3)').html(item.questoes.length);	
	ProvaController.item = item;
});

$(document).on("pagebeforecreate", "#home", function() {
	ProvaController.init();
});

$(document).on("pagebeforecreate", "#responder", function() {
	var questao = ProvaController.item.questoes[ProvaController.QuestaoSelecionadaIndex];
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
});
