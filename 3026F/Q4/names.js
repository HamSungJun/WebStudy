"use strict";
// 2013041007 함성준 화요일반 9시

document.observe("dom:loaded", function() {
	$("search").observe("click", searchClick);
	
	new Ajax.Request("names.php", {
		method: "get",
		parameters: {"type": "list"},
		onSuccess: loadBabies,
		onFailure: ajaxFailure,
		onException: ajaxFailure
	});
});

/* Change this function to work with the XML data arrived from the server.
 * 
 * 다음 function이 서버에서 반환되는 XML 데이터를 처리할 수 있도록 변경하시오. 
 */
function loadBabies(ajax) {
	alert(ajax.responseText);
	var babies = ajax.responseText.getElementsByTagName("name")
	for (var i = 0; i < babies.length; i++) {
		var option = $(document.createElement("option"));
		option.innerHTML = option.value = babies[i].getElementsByTagName("name").firstChild.nodeValue;
		$("allnames").appendChild(option);
	}
	$("allnames").disabled = false;
}

function searchClick() {
	var name = $("allnames").value;
	var gender = $("genderm").checked ? "m" : "f";
	if (name) {
		new Ajax.Request("names.php", {
			method: "get",
			parameters: {"name": name, "gender": gender},
			onSuccess: displayList,
			onFailure: ajaxRankFailure,
			onException: ajaxFailure
		});
	}
}

/* Change this function to work with the JSON data arrived from the server.
 * 
 * 다음 function이 서버에서 반환되는 JSON 데이터를 처리할 수 있도록 변경하시오. 
 */
function displayList(ajax) {
	removeExistingListItem();
	if (!ajax.responseText) { return; }
	
	var year = 1890;
	var ranks = ajax.responseText.split(" ");
	
	for (var i = 2; i < ranks.length; i++) {
		var li = document.createElement("li");
		
		li.innerHTML = (year + i * 10) + " : " + ranks[i];
		$("resultlist").appendChild(li);
	}
}

function removeExistingListItem(){
	while ($("resultlist").firstChild){
		$("resultlist").removeChild($("resultlist").firstChild);
	}
}

function ajaxRankFailure(ajax, exception) {
	if (ajax.status == 410) {
		removeExistingListItem();
		var li = document.createElement("li");
		li.innerHTML = "There is no ranking data for that name/gender combination!";
		$("resultlist").appendChild(li);
	} else {
		ajaxFailure(ajax, exception);
	}
}

function ajaxFailure(ajax, exception) {
	if (exception) {
		$("errors").innerHTML = "Exception during Ajax request: <br />\n <br />\n" + exception;
		throw exception;
	} else {
		$("errors").innerHTML = "Error making Ajax request: <br />\n <br />\n" +
			"Server status: <br />\n" + ajax.status + 
			(ajax.statusText ? (" (" + ajax.statusText + ")<br />\n <br />\n") : "") + 
			(ajax.responseText ? ("Server response text: <br />\n" + ajax.responseText) : "");
	}
}
