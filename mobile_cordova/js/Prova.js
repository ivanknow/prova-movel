var ProvaController = new Controller("prova", ".linkProva", "", "id");

ProvaController.setShowScreenList(function(items){
	var html = "";
	for (t in items) {
		var link = HTMLMaker().createTag("a").attr("href", "iniciarprova.html").attr("class","linkProva").content(items[t].titulo);
		var linkIcon = HTMLMaker().createTag("a").attr("href", "iniciarprova.html").attr("class","linkProva").content(items[t].titulo);
		html +=  HTMLMaker().createTag("li").content(link.show()+linkIcon.show()).show();		
		
		
/*		<li><a href='iniciarprova.html'> Prova 1 </a> <a href='iniciarprova.html' data-transition='pop'
					class='linkProva'>Iniciar</a></li>*/

	}

	$("#divListaProva").html(html);
});

/*ProvaController.setShowItem(function(item){
	
});*/

$(document).on("pagebeforecreate", "#home", function() {
	ProvaController.init();
});