/**
 * Object with values that is used for all aplication
 * 
 * Dependencias: Jquery, JqueryMobile
 */

var Values = {

	server : "http://localhost/workspace/aplicativo-cidade/server/index.php",
	appTitle : "Prova Móvel",
	appTitleAbout : "Prova Móvel - Sobre Nós",
	pages : {},

	init : function() {
		$(".html-from-values").each(function() {
			var id = $(this).attr('appid')
			$(this).html(Values[id]);
		});

		$(".text-from-values").each(function() {
			var id = $(this).attr('appid')
			$(this).text(Values[id]);
		});
		$(".value-from-values").each(function() {
			var id = $(this).attr('appid')
			$(this).val(Values[id]);
		});
	}

};