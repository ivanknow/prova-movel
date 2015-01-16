/*Controller Base*/

/*Dependences: jQuery,Values*/

Controller = function(urlRequest,linkClass,param,attr) {
	
	var 
	items = [],
	item = null,
	urlFinal="",
	idSelected=0;
	
	var 
	urlRequest = urlRequest||"",
	param=param||"",
	linkClass=linkClass||".link",
	attr=attr||"id";
	
	function init(){
		getAll();
	
		$(document).off("click", linkClass).on("click", linkClass,
				clickItem);
	}

	function getAll() {
		urlFinal = urlRequest;
		doRequestGet(onSuccessGetAll, onError);
	}
	function getById(id) {
	urlFinal = urlRequest+"/"+id+"/";
		doRequestGet(onSuccessGetById, onError);
	}
	function clickItem() {
		idSelected = $(this).attr(attr);
		alert("clicar item:"+idSelected);
	}
	function onSuccessGetAll(response) {
		items = response.items;
		showScreenList(items);
	}
	function onSuccessGetById(response) {
		alert("success");
		item = response.item;
		showItem(item);
	}

	function onError(response) {
		alert("fail");
	}

	function doRequestGet(onSuccess, onError) {
		var values = {
			type : "POST",
			dataType : "json",
			url : Values.server + "/" + urlRequest,
			data : param,
			success : onSuccess,
			error : onError
		};
		$.ajax(values);

	}
	function showScreenList(items) {
		alert(JSON.stringify(items));
	}
	function showItem(item) {
		alert(JSON.stringify(item));
	}
	
	function setShowScreenList(func){
		showScreenList = func;
	}
	function setShowItem(func) {
		showItem = func;
	}

	return {
		urlRequest:urlRequest,
		param:param,
		linkClass:linkClass,
		attr:attr,
		init : init,
		getAll:getAll,
		getById:getById,
		setShowItem:setShowItem,
		setShowScreenList:setShowScreenList
	};
};