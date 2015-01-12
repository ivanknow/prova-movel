
HTMLMaker = function() {
	var tagVar = {
		tagName : "",
		attr : [],
		content : ""
	};
	function createTag(tagName) {
		tagVar.tagName = tagName;
		tagVar.attr = [];
		return this;
	}
	function attr(attribute, value) {
		tagVar.attr.push({
			key : attribute,
			value : value
		});
		return this;
	}
	function content(value) {
		if (typeof (value) === "object") {
			tagVar.content = value.show();
		} else {
			tagVar.content = value;
		}
		return this;
	}
	function show() {
		var htmlReturn = "<" + tagVar.tagName + " ";
		for ( var c in tagVar.attr) {
			htmlReturn += " " + tagVar.attr[c].key + "='"
					+ tagVar.attr[c].value + "' ";
		}
		htmlReturn += ">" + tagVar.content + "</" + tagVar.tagName + ">";
		return htmlReturn;
	}

	return {
		createTag : createTag,
		attr : attr,
		content : content,
		show : show
	}
};