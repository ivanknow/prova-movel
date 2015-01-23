/**
 * Object with values that is used for all aplication
 * 
 * Dependencias: Jquery, JqueryMobile
 */

var Snippets = {

	init : function() {
		$(".html-from-snippets").each(function() {
			var snippet = $(this).attr('snippet')
			var html = $("#" + snippet).html();
			$(this).html(html);
		});
		$(".html-from-snippet-array").each(function() {

			var snippet = $(this).attr('snippet');

			var html = Snippets.getSnippet(snippet);
			
			$(this).html(html.show());
		});
	},
	snippetValues : [
			{
				id : 'snippet-btn-home',
				value : HTMLMaker()
						.createTag("a")
						.attr("href", "index.html")
						.attr("data-role='button'")
						.attr("class",
								"ui-btn ui-btn-right ui-icon-home ui-btn-icon-left")
						.content("Home")
			},
			{
				id : 'snippet-footer',
				value : HTMLMaker().createTag("a").attr("href", "about.html")
						.attr("data-transition", "slideup").attr("class",
								"ui-btn ui-corner-all").attr("style",
								"width: 100%").content("Sobre Nós").show()
			},
			{
				id : 'snippet-btn-voltar',
				value : HTMLMaker()
						.createTag("a")
						.attr("href", "#")
						.attr("data-transition", "slide")
						.attr("data-rel", "back")
						.attr("class",
								"ui-btn ui-btn-left ui-icon-back ui-btn-icon-left")
						.content("Voltar")
			},
			{
				id : 'snippet-btn-sair',
				value : HTMLMaker()
						.createTag("a")
						.attr("href", "index.html")
						.attr("data-transition", "slide")
						.attr("class",
								"ui-btn ui-btn-left ui-icon-delete ui-btn-icon-left")
						.content("Sair")
			},
			{
				id : 'snippet-item-resposta-fechada',
				value : HTMLMaker()
						.createTag("input")
						.attr("tipe", "radio")
						.attr("name", "respostaFechada")
						.content("")
			}

	],
	getSnippet : function(id) {
		for (var i = 0; i < Snippets.snippetValues.length; i++) {
			if (id === Snippets.snippetValues[i].id) {
				return Snippets.snippetValues[i].value;
			}
		}
		return null;
	}
};
