/**
 * Object with values that is used for all aplication
 * 
 * Dependencias: Jquery, JqueryMobile
 */

var Telefone = {
	divListaTelefone : "divListaTelefone",
	telefones : [],
	init : function() {

		Telefone.buscarTelefones();
		$(document).off("click", ".linkTelefone").on("click", ".linkTelefone",
				function() {

					var id = $(this).attr('appid');

					alert("ligar");
				});
	},
	buscarTelefones : function() {
		;

		Telefone.telefones = [ {
			"titulo" : "loja x",
			"telefone" : "38615251"
		}, {
			"titulo" : "loja 2",
			"telefone" : "38615251"
		}, {
			"titulo" : "loja 4",
			"telefone" : "38615251"
		} ];

		Telefone.mostrarTelefones();

	},
	mostrarTelefones : function() {

		var html = "";
		for (t in Telefone.telefones) {
			html += "<li>"
					+ "<a href='#'> "
					+ Telefone.telefones[t].titulo
					+ "</a>"
					+ "<a href='#' data-transition='pop' class='linkTelefone'>Ligar</a>"
					+ "</li>";

		}

		$("#" + Telefone.divListaTelefone).html(html);
	}
};

$(document).on("pagebeforecreate", "#" + Values.pages.telefone, function() {
	Telefone.init();
});