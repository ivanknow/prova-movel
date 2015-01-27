FinalizarController  = {
		init:function(){
			alert("finalizar");
			//deve ser disponivel aqui pegar as respostas
			//atribui evento a botao finalizar
			//atribui evento a botao cancelar
		},
};

$(document).on("pagebeforecreate", "#finalizar", function() {
	try {
		FinalizarController.init();
	}
	catch(err) {
		alert(err.message);
		window.location = "index.html";
	}
});