LonginController = {
	login : "",
	password : "",
	hash : "",
	init : function() {
		// atribui ação ao botão de logar
		$(document).off("click", "#btnLogin").on("click", "#btnLogin",
				LonginController.login);
		// href="home.html"
	},
	login : function() {
		// pega dados
		LonginController.login = $('#textEmail').val().trim();
		LonginController.password = $('#textPassword').val().trim();
		try {
			LonginController.validate();
			LonginController.ajax(LonginController.login,
					LonginController.password);
		} catch (err) {
			alert(err);
		}
	},
	ajax : function(login, password) {
		var values = {
			beforeSend : function() {
				$.mobile.loading('show');
			}, // Show spinner
			complete : function() {
				$.mobile.loading('hide');
			}, // Hide spinner
			type : "POST",
			dataType : "json",
			url : Values.server + "login",
			data : "login=" + login + "&password=" + password,
			success : LonginController.onSuccess,
			error : LonginController.onError
		};
		$.ajax(values);
	},

	onSuccess : function(response) {
		// alert(JSON.stringify(response));
		// se login for autorizado
		if (response['error'] === 0) {
			LonginController.hash = response['hash'];
			// vai pra proxima pagina
			$.mobile.changePage("home.html", {
				allowSamePageTransition : true,
				showLoadMsg : true,
				reloadPage : true
			});
		} else {
			alert(response['errorMessage']);
		}

	},
	onError : function(e) {
		alert("Houve um erro na comunicação com servidor");
	},
	validate : function() {
		if (LonginController.login === "") {
			throw "E-mail e obrigatorio";
		}
		if (LonginController.password === "") {
			throw "Senha e obrigatorio";
		}
	},
	reset : function() {
		LonginController.login = "";
		LonginController.password = "";
		LonginController.hash = "";
		}
};

$(document).on("pagebeforecreate", "#login", function() {
	try {
		LonginController.init();
	} catch (err) {
		alert(err.message);
		window.location = "index.html";
	}
});

$(document).on("pageshow", "#login", function() {
	LonginController.reset();
});
