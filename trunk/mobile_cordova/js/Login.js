LonginController  = {
		login:"",
		password:"",
		hash:"",
		init:function(){
			//atribui ação ao botão de logar
		},
		login:function(){
			//pega dados
			//envia pro servidor
				//se login for autorizado
				//salva hash
				//vai pra pagina de provas
			
				//se login n for autorizado
				//mostra mensagm
				//permanece no login
		}
};

$(document).on("pagebeforecreate", "#login", function() {
	try {
		LonginController.init();
	}
	catch(err) {
		alert(err.message);
		window.location = "index.html";
	}
});
